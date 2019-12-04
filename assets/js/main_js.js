$(document).ready(function () {

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay: true,
        smartSpeed: 6000,
        autoplayTimeout: 6000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
})