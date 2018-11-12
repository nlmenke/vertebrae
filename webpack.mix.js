const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
        publicPath: 'public/assets/',
        resourceRoot: '/assets/'
    })
    .copyDirectory('resources/assets/svg', 'public/assets/images')
    .js('resources/assets/scripts/app.js', 'scripts')
    .sass('resources/assets/sass/app.scss', 'styles');

if (mix.inProduction()) {
    mix.version()
        .sourceMaps();
}
