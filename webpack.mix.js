let mix = require('laravel-mix');
let NovaExtension = require('laravel-nova-devtool');

mix.extend('nova', new NovaExtension());

mix.setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .vue({ version: 3 })
    .css('resources/css/tool.css', 'css')
    .nova('sergeich5/nova-log-viewer')
    .version();
