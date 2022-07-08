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
    .vue('./components/StudentRegister.vue')
    .sass('resources/sass/app.scss', 'public/css',{
        sassOptions: {
          quietDeps: true,
        },
      })
    .css('resources/css/app.css', 'public/css');

mix.autoload({
  jquery: ["$", "jQuery", "window.jQuery"],
});

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');