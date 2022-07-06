let mix = require('laravel-mix')

require('./nova.mix')

mix
  .setPublicPath('dist')
  .js('resources/js/card.js', 'js')
  .css('resources/css/card.css', 'css')
  .vue({ version: 3 })
  .nova('abordage/html-card')
