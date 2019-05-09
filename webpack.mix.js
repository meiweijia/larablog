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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/images', 'public/images')
    .copy('resources/css/prism.css', 'public/css/prism.css')
    .copy('resources/js/prism.js', 'public/js/prism.js')
    .browserSync('http://127.0.0.1:8000');
