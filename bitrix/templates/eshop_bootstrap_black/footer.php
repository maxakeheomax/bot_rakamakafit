<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		<footer class="footer">
			<div class="footer__footer-wrapper">
				<div class="footer__line"></div>
				<div class="footer__nav">
					<div class="footer__nav__logo">
						<img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo-footer.png" alt="">
					</div>
					<?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "bottom_menu",
                            Array(
                                "ROOT_MENU_TYPE" => "bottom", 
                                //"CHILD_MENU_TYPE" => "left",
                                "MAX_LEVEL" => "3", 
                                "USE_EXT" => "Y" 
                            )
                        );?>
				</div>
				<div class="footer__footer-credits">
					<div class="footer__footer-credits__icons">
						<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-inst.svg" alt=""></a>
						<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-ytb.svg" alt=""></a>
						<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-vk.svg" alt=""></a>
					</div>
					<div class="footer__footer-credits__official-info">
						<ul>
							<li><a href="#">Доставка и оплата</a></li>
							<li><a href="#">Полезная информация</a></li>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
					<div class="footer__footer-credits__phones">
						<ul>
							<li>
								<nobr><a href="tel:88003331363">8 (800) 333 13 63</a></nobr>
							</li>
							<li>
								<nobr><a href="tel:88001234573?">8 (800) 123 45 73</a></nobr>
							</li>
							<li>
								<nobr><a href="tel:88003331363">8 (800) 333 13 63</a></nobr>
							</li>
						</ul>
					</div>
					<div class="footer__footer-credits__requisites">
						ИП Чирченко А.И. 119261,<br>
						Москва, Ленинский проспект 85 <br>
						ИНН 770970317833<br>
						ОГРНИП 316774600448261
					</div>
				</div>
				<div class="footer__brand">
					© 2019. RAKAMAKAFIT
				</div>
			</div>
		</footer>
	</div>






<script>
	$(document).ready(function(){
		$('.owl-carousel.up-slider').owlCarousel({
			items:1,
			lazyLoad:true,
			loop:true,
			margin:10,
			dots: false,
			nav:true,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
		});

		$('.owl-carousel.middle-slider').owlCarousel({
			items:1,
			lazyLoad:true,
			loop:true,
			margin:10,
			dots: true,
			nav:true,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
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
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`]
		});

		$('.slick-slider').slick({
			slidesToShow:3,
			slidesToScroll: 1,
			arrows: true,
			appendArrows: $('.bottom-slider-nav-buttons'),
			prevArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,
			nextArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`,
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