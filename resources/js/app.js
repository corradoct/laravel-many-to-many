require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
  $('h3').on('mouseenter', function() {
    $(this).find('a').addClass('blue');
  });

  $('h3').on('mouseleave', function() {
    $(this).find('a').removeClass('blue');
  });
});
