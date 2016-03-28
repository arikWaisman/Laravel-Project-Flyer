var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.scripts(['jquery/dist/jquery.js','sweetalert/dist/sweetalert-dev.js', 'lightbox2/dist/js/lightbox.js'],
        'public/js/libs.js',
        'node_modules/');
    //mix.scripts('js', 'public/js/all.js', 'public/' );
    mix.copy('node_modules/lightbox2/dist/images/', 'public/images');
});
