const { mix } = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/css');

/* Optional: uncomment for bootstrap fonts */
// mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');