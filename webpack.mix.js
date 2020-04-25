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

mix.babel([
        'node_modules/jquery/dist/jquery.js',
        'resources/js/plugins/bootstrap-notify/bootstrap-notify.js',
        'resources/js/plugins/notifications.js',
        'resources/js/app.js'
    ], 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .version();
