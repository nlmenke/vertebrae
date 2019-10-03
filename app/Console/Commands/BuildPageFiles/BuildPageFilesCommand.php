<?php declare(strict_types=1);

namespace App\Console\Commands\BuildPageFiles;

use File;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Composer;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class BuildPageFilesCommand
 *
 * @package App\Console\Commands\BuildPageFiles
 * @author  Nick Menke <nick@nlmenke.net>
 */
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
    protected $description = 'Build the files needed for a new API/page.';

    /**
     * The Composer instance.
     *
     * @var Composer
     */
    protected $composer;

    /**
     * The default feature type.
     *
     * @var string
     */
    protected $defaultType = 'api';

    /**
     * The selected feature type.
     *
     * @var string
     */
    protected $selectedType;

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
            ['name', InputArgument::REQUIRED, 'The name of the API/page being created'],
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
            ['type', '', InputOption::VALUE_OPTIONAL, 'Specify the feature type: `api` or `page`'],
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

        if ($this->option('type') === null || !in_array($this->option('type'), ['api', 'page'])) {
            $this->selectedType = $this->choice('What type of feature will this be?', ['api', 'page'], $this->defaultType);
        } else {
            $this->selectedType = $this->option('type');
        }

        $name = Str::studly(Str::singular($this->argument('name')));

        $controllerPath = app_path('Http/Controllers');
        if ($this->isApi()) {
            $controllerPath = $controllerPath . '/Api';
            $controllerFile = $name . 'ApiController.php';
        } else {
            $controllerFile = $name . 'Controller.php';
        }

        $modelPath = app_path('Entities/' . $name);
        $modelFile = $name . '.php';

        $requestPath = app_path('Http/Requests/' . $name);
        $createRequestFile = 'Create' . $name . 'Request.php';
        $updateRequestFile = 'Update' . $name . 'Request.php';

        $resourcePath = app_path('Http/Resources/' . $name);
        $resourceFile = $name . 'Resource.php';

        $stylePath = resource_path('assets/sass/pages');
        $styleFile = '_' . Str::plural(Str::snake($name, '-')) . '.scss';

        $languageFile = Str::plural(Str::snake($name, '-')) . '.php';

        $featureTestPath = base_path('tests/Feature/Controllers');
        if ($this->isApi()) {
            $featureTestPath = $featureTestPath . '/Api';
            $featureTestFile = $name . 'ApiControllerTest.php';
        } else {
            $featureTestFile = $name . 'ControllerTest.php';
        }

        $unitTestPath = base_path('tests/Unit');
        $unitTestFile = $name . 'Test.php';

        // check for existing model; no need to create if files exist
        if (File::exists($modelPath . '/' . $modelFile)) {
            $this->error($name . ' already exists!');
            exit;
        }

        // create controller and add to Git
        $controller = $this->buildFile($name, ($this->isApi() ? 'controller.api' : 'controller'));
        $this->saveFile($controllerPath, $controllerFile, $controller);
        $this->gitAdd($controllerPath . '/' . $controllerFile);

        // create model and add to Git
        $model = $this->buildFile($name, 'model');
        $this->saveFile($modelPath, $modelFile, $model);
        $this->gitAdd($modelPath . '/' . $modelFile);

        // create create request and add to Git
        $createRequest = $this->buildFile($name, 'request.create');
        $this->saveFile($requestPath, $createRequestFile, $createRequest);
        $this->gitAdd($requestPath . '/' . $createRequestFile);

        // create update request and add to Git
        $updateRequest = $this->buildFile($name, 'request.update');
        $this->saveFile($requestPath, $updateRequestFile, $updateRequest);
        $this->gitAdd($requestPath . '/' . $updateRequestFile);

        if ($this->isApi()) {
            // create API resource and add to Git
            $resource = $this->buildFile($name, 'resource');
            $this->saveFile($resourcePath, $resourceFile, $resource);
            $this->gitAdd($resourcePath . '/' . $resourceFile);
        }

        // create stylesheet and add to Git
        $this->saveFile($stylePath, $styleFile, '');
        $this->gitAdd($stylePath . '/' . $styleFile);

        // create languages and add to Git
        foreach (File::directories(resource_path('lang')) as $languagePath) {
            $language = $this->buildfile(Str::snake($name, '-'), 'lang');
            $this->saveFile($languagePath, $languageFile, $language);
            $this->gitAdd($languagePath . '/' . $languageFile);
        }

        // create feature test and add to Git
        $featureTest = $this->buildFile($name, ($this->isApi() ? 'test.feature.controller.api' : 'test.feature.controller'));
        $this->saveFile($featureTestPath, $featureTestFile, $featureTest);
        $this->gitAdd($featureTestPath . '/' . $featureTestFile);

        // create unit test and add to Git
        $unitTest = $this->buildFile($name, 'test.unit');
        $this->saveFile($unitTestPath, $unitTestFile, $unitTest);
        $this->gitAdd($unitTestPath . '/' . $unitTestFile);

        if ($this->option('migration')) {
            // create migration and add to Git
            $this->buildMigration($name);
            $this->gitAdd('$(git ls-files database/migrations --other --exclude-standard)');
        }

        if ($this->option('seeder')) {
            // create seeder and add to Git
            $seederPath = database_path('seeds');
            $seederFile = Str::plural($name) . 'TableSeeder.php';

            $seeder = $this->buildFile($name, 'seeder');
            $this->saveFile($seederPath, $seederFile, $seeder);
            $this->gitAdd($seederPath . '/' . $seederFile);
        }

        if ($this->option('factory')) {
            // create factory and add to Git
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
     * Gets the file stub and fills in the contents.
     *
     * @param string $name
     * @param string $type
     * @return string
     * @throws FileNotFoundException
     */
    private function buildFile(string $name, string $type): string
    {
        $file = File::get($this->getStub($type));

        $replacements = [
            'LowerDummyRootNamespace' => strtolower($this->laravel->getNamespace()),
            'DummyRootNamespace' => $this->laravel->getNamespace(),
            'LowerDummy' => strtolower($name),
            'Dummy' => $name,
            'LowerDummies' => strtolower(Str::plural($name)),
            'Dummies' => strtolower(Str::plural($name)),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $file);
    }

    /**
     * Generates a migration file.
     *
     * @param string $name
     * @return void
     */
    private function buildMigration(string $name)
    {
        $table = Str::plural(Str::snake($name));
        $migration = 'create_' . $table . '_table';

        $this->call('make:migration', [
            'name' => $migration,
            '--create' => $table,
        ]);
    }

    /**
     * Pulls the specified stub file.
     *
     * @param string $type
     * @return string
     */
    private function getStub(string $type): string
    {
        return __DIR__ . '/stubs/' . $type . '.stub';
    }

    /**
     * Adds the file to Git.
     *
     * @param string $file
     * @return void
     */
    private function gitAdd(string $file): void
    {
        exec('git add ' . $file, $output);

        $this->output->write($output, true);
    }

    /**
     * Checks if the feature should be an API.
     *
     * @return bool
     */
    private function isApi(): bool
    {
        return $this->selectedType === 'api';
    }

    /**
     * Saves the generated file.
     *
     * @param string $path
     * @param string $filename
     * @param string $file
     * @return void
     */
    private function saveFile(string $path, string $filename, string $file): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 493, true, true);
        }

        File::put($path . '/' . $filename, $file);

        $this->line('<info>Built File:</info> ' . $filename);
    }
}
