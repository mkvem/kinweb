const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copyDirectory('resources/assets/js/plugins', 'public/js/plugins')
   .copyDirectory('resources/assets/plugins', 'public/plugins')
   .styles([
      'resources/assets/css/custom.css',
      'resources/assets/css/nprogress.css'
    ], 'public/css/custom.css');