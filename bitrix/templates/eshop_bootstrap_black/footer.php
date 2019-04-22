<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
	$(document).ready(function(){
		$('.owl-carousel.up-slider').owlCarousel({
			items:1,
			lazyLoad:true,
			loop:true,
			margin:10,
			dots: false,
			nav:true,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
		});

		$('.owl-carousel.middle-slider').owlCarousel({
			items:1,
			lazyLoad:true,
			loop:true,
			margin:10,
			dots: true,
			nav:true,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
		});

		$('.owl-carousel.bottom-slider').owlCarousel({
			items:5,
			stagePadding: 60,
			lazyLoad:true,
			loop:true,
			autoplay:true,
			margin:10,
			dots: false,
			nav:true,
			navText: [`<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,`<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`]
		});

		$('.slick-slider').slick({
			slidesToShow:3,
			slidesToScroll: 1,
			arrows: true,
			appendArrows: $('.bottom-slider-nav-buttons'),
			prevArrow: `<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,
			nextArrow: `<img <src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`,
			swipe:true,
			draggable: true,
			variableWidth: true,
			easing: 'ease-in-out',
			cssEase: 'ease-in-out',
			autoplay: true
		});
	});
</script>
</body>
</html>