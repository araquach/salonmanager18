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
    mix.copy(
        'node_modules/vue/dist/vue.js',
        'resources/assets/js'
    )
    
    .copy(
        'node_modules/jquery/dist/jquery.js',
        'resources/assets/js'
    )
    
    mix.scripts([
        'vue.js',
     ], 'public/scripts/vue.js')
     
     .scripts([
        'jquery.js',
     ], 'public/scripts/jquery.js');
    
    mix.sass('app.scss');

    mix.version([
        'public/css/app.css'
    ]);
    
});