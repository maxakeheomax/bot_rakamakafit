$(document).ready(function () {
    $('.slider-nav-block').slick({
        slidesToShow:6,
        infinite: false,
        slidesToScroll:1,
        focusOnSelect: true,
        vertical: true,
        verticalSwiping: true,
        arrows: true,
        asNavFor: '.slider-product-view',
        
    });

    $('.slider-product-view').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false
    });
})