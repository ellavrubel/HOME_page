$(document).ready(function () {

  $('.menu__button-wrapper').click(function (e) {

    e.preventDefault();

    $('.header__menu').toggleClass('active');
    $('body').toggleClass('lock');

  })

});