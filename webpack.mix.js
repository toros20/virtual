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

mix.js(
   [

     'resources/js/app.js',
     'resources/js/jquery-3.2.1.js',
     'resources/js/jquery.appear.js',
     'resources/js/jquery.mousewheel.js',
     'resources/js/perfect-scrollbar.js',
     'resources/js/jquery.matchHeight.js',
     'resources/js/svgxuse.js',
     'resources/js/imagesloaded.pkgd.js',
     'resources/js/Headroom.js',
     'resources/js/velocity.js',
     //'resources/js/ScrollMagic.js',
     'resources/js/jquery.waypoints.js',
     'resources/js/jquery.countTo.js',
     'resources/js/popper.min.js',
     'resources/js/material.min.js',
     'resources/js/bootstrap-select.js',
     'resources/js/smooth-scroll.js',
     'resources/js/selectize.js',
     'resources/js/swiper.jquery.js',

     //'resources/js/moment.js',
    // 'resources/js/daterangepicker.js',
     'resources/js/simplecalendar.js',
     //'resources/js/fullcalendar.js',
     'resources/js/isotope.pkgd.js',
     'resources/js/ajax-pagination.js',
     'resources/js/Chart.js',
     'resources/js/chartjs-plugin-deferred.js',
     'resources/js/circle-progress.js',
     'resources/js/loader.js',
     'resources/js/run-chart.js',
     'resources/js/jquery.magnific-popup.js',
     'resources/js/jquery.gifplayer.js',
     //'resources/js/mediaelement-and-player.js',
     //'resources/js/mediaelement-playlist-plugin.min.js',
     'resources/js/ion.rangeSlider.js',
     'resources/js/base-init.js',
     'resources/fonts/fontawesome-all.js',
     'resources/js/bootstrap.bundle.min.js'
     //'resources/js/bootstrap.min.js'

   ] , 'public/js/app.js');


   //.sass('resources/sass/app.scss', 'public/css/app.css');
