/**
 * Mix Asset Management.
 *
 * Mix provides a clean, fluent API for defining some Webpack build steps
 * for your Laravel application. By default, we are compiling the Sass
 * file for the application as well as bundling up all the JS files.
 *
 * @package   Laravel
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 * @since     0.0.0-framework introduced
 * @since     x.x.x           setup new structure
 */

const mix = require('laravel-mix');

mix.options({
        publicPath: 'public/assets/',
        resourceRoot: '/assets/'
    })
    .copyDirectory('resources/assets/svg', 'public/assets/images')
    .js('resources/assets/scripts/app.js', 'scripts')
    .sass('resources/assets/sass/app.scss', 'styles')
    .extract([
        'bootstrap',
        'vue'
    ]);

mix.sourceMaps(false);

if (mix.inProduction()) {
    mix.version();
}
