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
    .js('resources/js/logout.js', 'public/js')
    .js('resources/js/addToCartOneProduct.js', 'public/js')
    .js('resources/js/removeCartItem.js', 'public/js')
    .js('resources/js/addInput.js', 'public/js')
    .js('resources/js/dataTable.js', 'public/js')
    .js('resources/js/comment.js', 'public/js')
    .js('resources/js/loadComment.js', 'public/js')
    .js('resources/js/lineChart.js', 'public/js')
    .js('resources/js/pusher.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css')
    mix.copy('node_modules/chart.js/dist/Chart.js', 'public/js');
