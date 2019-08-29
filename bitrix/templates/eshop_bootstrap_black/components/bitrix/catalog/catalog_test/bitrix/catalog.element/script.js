$(document).ready(function () {
    $('.slider-nav-block').slick({
        slidesToShow: 6,
        slidesPerRow: 6,
        focusOnSelect: true,
        asNavFor: '.slider-product-view',
        vertical: true,
        verticalSwiping: true,
        arrows: true,
        nextArrow: `<div class="slick-arrow-wrapper"><img src="/bitrix/templates/eshop_bootstrap_black/assets/arrow_down.svg"></div>`
    });

    $('.slider-product-view').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false
    });
});
