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
    mix.copy('bower_components/bootstrap', 'public/bower_components/bootstrap');
    mix.copy('bower_components/metisMenu/dist/metisMenu.min.js', 'public/bower_components/metisMenu/dist/metisMenu.min.js');
    mix.copy('bower_components/font-awesome', 'public/bower_components/font-awesome');
    mix.copy('bower_components/ckeditor', 'public/bower_components/ckeditor');
    mix.copy('bower_components/bootstrap-fileinput', 'public/bower_components/bootstrap-fileinput');
    mix.copy('bower_components/firebase', 'public/bower_components/firebase');
    mix.copy('bower_components/sweetalert', 'public/bower_components/sweetalert');
    mix.copy('bower_components/jquery', 'public/bower_components/jquery');
});
