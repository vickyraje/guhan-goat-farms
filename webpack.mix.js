const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
// JS MIX //
mix.js('resources/assets/js/calendar.js', 'public/assets/js')
mix.js('resources/assets/js/custom.js', 'public/assets/js')
mix.js('resources/assets/js/custom1.js', 'public/assets/js')
mix.js('resources/assets/js/fullcalendar.js', 'public/assets/js')
mix.js('resources/assets/js/index1.js', 'public/assets/js')
mix.js('resources/assets/js/index.js', 'public/assets/js')
mix.js('resources/assets/js/profile.js', 'public/assets/js')
mix.js('resources/assets/js/progress.js', 'public/assets/js')
mix.js('resources/assets/js/select2.js', 'public/assets/js')
mix.js('resources/assets/js/sticky.js', 'public/assets/js')
mix.js('resources/assets/js/themeColors.js', 'public/assets/js')
mix.js('resources/assets/js/userlist.js', 'public/assets/js')

// CSS MIX //
mix.postCss('resources/assets/css/animated.css', 'public/assets/css')

// // SASS or SCSS MIX to CSS
mix.sass('resources/assets/css/skin-modes.scss', 'public/assets/css')
mix.sass('resources/assets/scss/style.scss', 'public/assets/css')

// // COPY DIRECTORIES //
mix.copyDirectory('resources/assets/images', 'public/assets/images')
mix.copyDirectory('resources/assets/plugins', 'public/assets/plugins')
mix.copyDirectory('resources/assets/switcher', 'public/assets/switcher')


mix.options({
    processCssUrls: false
});

// mix.browserSync('http://127.0.0.1:8000');
