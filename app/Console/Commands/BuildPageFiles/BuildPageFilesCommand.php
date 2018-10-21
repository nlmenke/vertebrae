<?php namespace App\Console\Commands\BuildPageFiles;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Composer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;

class BuildPageFilesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'build:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build the files needed for a new page/API.';

    /**
     * The Composer instance.
     *
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @param Composer $composer
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();

        $this->composer = $composer;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the page being created'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['migration', 'm', InputOption::VALUE_NONE, 'Generate a migration'],
            ['seeder', 's', InputOption::VALUE_NONE, 'Generate a seeder'],
            ['factory', 'f', InputOption::VALUE_NONE, 'Generate a factory'],
        ];
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws FileNotFoundException
     */
    public function handle(): void
    {
        if ($this->laravel->environment() !== 'local') {
            $this->error('Files should only be generated in a local environment');
            exit;
        }

        $name = studly_case(str_singular($this->argument('name')));

        $controllerPath = app_path('Http/Controllers/Api');
        $controllerFile = $name . 'ApiController.php';

        $modelPath = app_path('Entities/' . $name);
        $modelFile = $name . '.php';

        $requestPath = app_path('Http/Requests/' . $name);
        $createRequestFile = 'Create' . $name . 'Request.php';
        $updateRequestFile = 'Update' . $name . 'Request.php';

        $resourcePath = app_path('Http/Resources/' . $name);
        $resourceFile = $name . 'Resource.php';

        $stylePath = resource_path('assets/sass');
        $styleFile = str_plural(snake_case($name, '-')) . '.scss';

        $languageFile = str_plural(snake_case($name, '-')) . '.php';

        // check for existing model; no need to create if files exist
        if (\File::exists($modelFile)) {
            $this->error($name . ' already exists!');
            exit;
        }

        // create controller and add to git
        $controller = $this->buildFile($name, 'controller');
        $this->saveFile($controllerPath, $controllerFile, $controller);
        $this->gitAdd($controllerPath . '/' . $controllerFile);

        // create model and add to git
        $model = $this->buildFile($name, 'model');
        $this->saveFile($modelPath, $modelFile, $model);
        $this->gitAdd($modelPath . '/' . $modelFile);

        // create create request and add to git
        $requestCreate = $this->buildFile($name, 'request.create');
        $this->saveFile($requestPath, $createRequestFile, $requestCreate);
        $this->gitAdd($requestPath . '/' . $createRequestFile);

        // create update request and add to git
        $requestUpdate = $this->buildFile($name, 'request.update');
        $this->saveFile($requestPath, $updateRequestFile, $requestUpdate);
        $this->gitAdd($requestPath . '/' . $updateRequestFile);

        // create resource and add to git
        $resource = $this->buildFile($name, 'resource');
        $this->saveFile($resourcePath, $resourceFile, $resource);
        $this->gitAdd($resourcePath . '/' . $resourceFile);

        // create style and add to git
        $this->saveFile($stylePath, $styleFile, '');
        $this->gitAdd($stylePath . '/' . $styleFile);

        // create languages and add to git
        foreach (\File::directories(resource_path('lang')) as $languagePath) {
            $language = $this->buildFile(snake_case($name, '-'), 'lang');
            $this->saveFile($languagePath, $languageFile, $language);
            $this->gitAdd($languagePath . '/' . $languageFile);
        }

        // create tests and add to git
        $testFile = $name . 'Test.php';

        // feature test
        $featureTestPath = base_path('tests/Feature');
        $featureTest = $this->buildFile($name, 'test.feature');
        $this->saveFile($featureTestPath, $testFile, $featureTest);
        $this->gitAdd($featureTestPath . '/' . $testFile);

        // unit test
        $unitTestPath = base_path('tests/Unit');
        $unitTest = $this->buildFile($name, 'test.unit');
        $this->saveFile($unitTestPath, $testFile, $unitTest);
        $this->gitAdd($unitTestPath . '/' . $testFile);

        // create migration and add to git
        if ($this->option('migration')) {
            $this->buildMigration($name);
            $this->gitAdd('$(git ls-files database/migrations --other --exclude-standard)');
        }

        // create seeder and add to git
        if ($this->option('seeder')) {
            $seederPath = database_path('seeds');
            $seederFile = str_plural($name) . 'TableSeeder.php';

            $seeder = $this->buildFile($name, 'seeder');
            $this->saveFile($seederPath, $seederFile, $seeder);
            $this->gitAdd($seederPath . '/' . $seederFile);
        }

        // create factory and add to git
        if ($this->option('factory')) {
            $factoryPath = database_path('factories');
            $factoryFile = $name . 'Factory.php';

            $factory = $this->buildFile($name, 'factory');
            $this->saveFile($factoryPath, $factoryFile, $factory);
            $this->gitAdd($factoryPath . '/' . $factoryFile);
        }

        // dump composer autoload so everything gets loaded properly
        $this->composer->dumpAutoloads();

        $this->info('File generation complete!');
    }

    /**
     * Get file data from stub and build the file contents.
     *
     * @param string $name
     * @param string $type
     * @return string
     * @throws FileNotFoundException
     */
    private function buildFile(string $name, string $type): string
    {
        $file = \File::get($this->getStub($type));

        $replacements = [
            'LowerDummyRootNamespace' => strtolower($this->laravel->getNamespace()),
            'DummyRootNamespace' => $this->laravel->getNamespace(),
            'LowerDummy' => strtolower($name),
            'Dummy' => $name,
            'LowerDummies' => strtolower(str_plural($name)),
            'Dummies' => str_plural($name),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $file);
    }

    /**
     * Generate migration file.
     *
     * @param string $name
     * @return void
     */
    private function buildMigration(string $name): void
    {
        $table = str_plural(snake_case($name));
        $migration = 'create_' . $table . '_table';

        $this->call('make:migration', [
            'name' => $migration,
            '--create' => $table,
        ]);
    }

    /**
     * Pull specified stub.
     *
     * @param string $type
     * @return string
     */
    private function getStub(string $type): string
    {
        return __DIR__ . '/stubs/' . $type . '.stub';
    }

    /**
     * Add file to git.
     *
     * @param string $file
     * @return void
     */
    private function gitAdd(string $file): void
    {
        exec('git add ' . $file, $output);

        (new ConsoleOutput)->write($output, true);
    }

    /**
     * Save the generated file.
     *
     * @param string $path
     * @param string $filename
     * @param string $file
     * @return void
     */
    private function saveFile(string $path, string $filename, string $file): void
    {
        if (!\File::isDirectory($path)) {
            \File::makeDirectory($path, 493, true, true);
        }

        \File::put($path . '/' . $filename, $file);

        $this->line('<info>Built File:</info> ' . $filename);
    }
}
