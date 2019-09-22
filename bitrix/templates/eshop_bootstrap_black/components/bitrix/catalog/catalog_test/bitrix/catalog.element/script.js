$(document).ready(function () {
    $('.slider-nav-block').slick({
        slidesToShow: 6,
        slidesPerRow: 6,
        focusOnSelect: true,
        asNavFor: '.slider-product-view',
        vertical: true,
        verticalSwiping: true,
        arrows: true,
        nextArrow: `<div class="slick-arrow-wrapper wrapper_bottom"><img src="/bitrix/templates/eshop_bootstrap_black/assets/arrow_down.svg"></div>`,
        prevArrow: `<div class="slick-arrow-wrapper wrapper_up"><img src="/bitrix/templates/eshop_bootstrap_black/assets/arrow_up.svg"></div>`,
        responsive: [
			{
				breakpoint: 1360,
				settings: {
					arrows: false
				}
			}
			]
    });

    $('.slider-product-view').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false
    });
});
