$(document).ready(function () {
    $('.slider-nav-block').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        asNavFor: '.slider-product-view'
    });

    $('.slider-product-view').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false
    });
})