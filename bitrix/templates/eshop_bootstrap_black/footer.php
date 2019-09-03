<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<footer class="footer footer-desktop">
	<div class="footer__footer-wrapper">
		<div class="footer__line"></div>
		<div class="footer__nav">
			<div class="footer__nav__logo">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo-footer.png" alt="">
			</div>
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"bottom_menu",
				array(
					"ROOT_MENU_TYPE" => "bottom",
					//"CHILD_MENU_TYPE" => "left",
					"MAX_LEVEL" => "3",
					"USE_EXT" => "Y"
				)
			); ?>
		</div>
		<div class="footer footer-desktop footer__footer-credits">
			<div class="footer__footer-credits__icons">
				<a target="_blank" href="https://vk.com/rakamakafit"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-inst.svg" alt=""></a>
				<a target="_blank" href="https://www.youtube.com/channel/UCVZQTeZTLrz166tbN0bEGkg?sub_confirmation=1"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-ytb.svg" alt=""></a>
				<a target="_blank" href="https://www.instagram.com/rakamaka.fit/"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/footer-vk.svg" alt=""></a>
			</div>
			<div class="footer__footer-credits__official-info">
				<ul>
					<li><a href="/delivery/">Доставка и оплата</a></li>
					<li><a href="/about/">Полезная информация</a></li>
					<li><a href="/about/">О компании</a></li>
					<li><a href="/contacts/">Контакты</a></li>
					<li><a href="/opt/">Опт</a></li>
					<li><a href="/agreement/">Политика конфиденциальности</a></li>
				</ul>
			</div>
			<div class="footer__footer-credits__phones">
				<ul>
					<li>
						<nobr><a href="tel:+74957874058">+7 (495) 787 40 58</a></nobr>
					</li>
					<li>
						<nobr><a href="mailto:hello@rakamakafit.ru">hello@rakamakafit.ru</a></nobr>
					</li>
					<!--<li>
								<nobr><a href="tel:88003331363">8 (800) 333 13 63</a></nobr>
							</li> -->
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
<footer class="footer footer-tablet">
	<div class="footer__line"></div>
	<div class="footer__footer-wrapper">

		<div class="footer__nav">
			<div class="footer__nav__logo">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo-svg.svg" alt="">
			</div>
			<div class="footer__footer-credits__icons">
				<a href="https://vk.com/rakamakafit"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/vk-color-tablet.svg" alt=""></a>
				<a href="https://www.youtube.com/channel/UCVZQTeZTLrz166tbN0bEGkg?sub_confirmation=1"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb-color-tablet.svg" alt=""></a>
				<a href="https://www.instagram.com/rakamaka.fit/"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/inst-color-tablet.svg" alt=""></a>
			</div>
		</div>
		<div class="footer__nav-bar-block">
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"bottom_menu",
				array(
					"ROOT_MENU_TYPE" => "bottom",
					//"CHILD_MENU_TYPE" => "left",
					"MAX_LEVEL" => "3",
					"USE_EXT" => "Y"
				)
			); ?>
		</div>
		<div class="footer__footer-credits">
			<div class="footer__footer-credits__official-info">
				<ul>
					<li><a href="#">Доставка </a></li>
					<li><a href="#">Oплата</a></li>
					<li><a href="#">Полезная информация</a></li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Контакты</a></li>
				</ul>
			</div>
			<div class="footer__footer-credits__phones">
				<ul>
					<li>
						<nobr><a href="tel:+74957874058">+7 (495) 787 40 58</a></nobr>
					</li>
					<li>
						<nobr><a href="mailto:hello@rakamakafit.ru">hello@rakamakafit.ru</a></nobr>
					</li>
				</ul>
			</div>
			<div class="footer__footer-credits__requisites">
				ИП Чирченко А.И. 119261,<br>
				Москва, Ленинский проспект 85 <br>
				ИНН 770970317833<br>
				ОГРНИП 316774600448261
				<div class="footer__brand">
					© 2019. RAKAMAKAFIT
				</div>
			</div>
		</div>
	</div>
</footer>
</div>


<!--reg-block -->
<div class="auth-container">
	<div class="blur-block"></div>
	<div class="auth-block">
		<div class="close-button"></div>
		<!--LogIn-block -->
		<div class="LogIn-block">
			<h2>Вход</h2>
			<form class="auth-block-form" action="/auth.php">
				<input type="hidden" name="ajax_key" value="<?= md5('ajax_' . LICENSE_KEY) ?>" />
				<div class="auth-reg-wrapper login-block">
					<input name="mail" id="email" class="auth-reg__form__input" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email*'>
					<label></label>
					<input name="password" id="pass" class="auth-reg__form__input pass" type="password" placeholder='Пароль*'>
					<label for="pass"></label>
					<p id="login_error_text_section" style="color: red; display:none;">Не правильный логин или пароль</p>

					<div class="promo-form-block__form__input-checkbox-wrapper">
						<input class="promo-form-block__form__checbox" type="checkbox" name="remember" id="auth-checkbox">
						<label for="auth-checkbox"></label>
						<p class="promo-form-block__form__checbox-desc ">Запомнить меня</a></p>
					</div>
					<button class="login-block__form__submit" type="submit">войти</button>
				</div>
			</form>
			<h2>Первый раз тут?</h2>
			<button class="reg-button" type="submit">регистрация</button>
			<p class="login-block__p">Войти с помощью</p>
			<div class="auth-social-block">
				<a href="#">
					<div class="auth-social-block-item" style="background:url(assets/vk-reg-form.svg)no-repeat center;"></div>
				</a>
				<a href="#">
					<div class="auth-social-block-item" style="background:url(assets/fb-reg-form.svg)no-repeat center;"></div>
				</a>
				<a href="#">
					<div class="auth-social-block-item" style="background:url(assets/ggl-plus-reg-form.svg)no-repeat center;"></div>
				</a>
			</div>
		</div>
		<!--end of LogIn-block -->

		<!-- reg-block -->
		<div class="registr-block hidden-block">
			<h2>Регистрация</h2>
			<form id="register_form" class="auth-block-form" action="/register.php">
				<div class="auth-reg-wrapper">

					<input name="name" id="name" class="auth-reg__form__input registration_field" type="text" pattern="[A-Za-zА-Яа-яЁё]+" placeholder='Имя'>
					<label for="name"></label>

					<input name="mail" id="email" class="auth-reg__form__input registration_field" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email*'>
					<label></label>

					<input name="password" id="pass" class="auth-reg__form__input registration_field pass" type="password" placeholder='Пароль*'>
					<label for="pass"></label>


					<input name="repeat-password" id="repeat-pass" class="auth-reg__form__input registration_field pass" type="password" placeholder='Повторите пароль*'>
					<label for="repeat-pass"></label>


					<div class="promo-form-block__form__input-checkbox-wrapper">
						<input class="promo-form-block__form__checbox" type="checkbox" name="" id="reg-checkbox">
						<label class='big-label' for="reg-checkbox"></label>
						<p class="promo-form-block__form__checbox-desc">Я согласен с <a href="#">обработкой данных</a></p>
					</div>
					<button class="promo-form-block__form__submit continue " type="submit" disabled>продолжить</button>
				</div>
			</form>
		</div>
		<!-- end of reg block -->
		<!-- greetings-block -->

		<div class="greetings-block hidden-block">
			<h2>Регистрация прошла успешно!</h2>
			<span class="hello-icon" style="background: url('assets/waving-hand-sign.png') no-repeat; background-size:contain; "></span>
			<div class="up-hello-block__left-side__title">Привет, <span id="login_username"> Капитолина </span></div>
			<p class="greetings-block__disc">Мы рады, что ты к нам присоединилась!
				Начни меняться вместе с нами прямо сейчас!</p>
			<div class="auth-reg-wrapper">
				<button id='after_login_submit' class="login-block__form__submit" type="submit">хорошо</button>
			</div>
		</div>
		<!-- end of greetings-block -->

	</div>
</div>



<script>
	$(document).ready(function() {
		$('.owl-carousel.slider-tablet').owlCarousel({
			items: 3,
			lazyLoad: true,
			loop: true,
			margin: 5,
			dots: false,
			smartSpeed: 800,
			nav: false,
			stagePadding: 36,
			mergeFit: true
		});
		$pic = $('.owl-carousel.up-slider-pics');
		$text = $('.owl-carousel.up-slider');
		$pic.owlCarousel({
			items: 1,
			lazyLoad: true,
			loop: true,
			margin: 0,
			dots: false,
			nav: false,
			touchDrag: false,
			mouseDrag: false,
			animateIn: 'fadeIn', // add this
			animateOut: 'fadeOut' // and this
		});
		$text.owlCarousel({
			items: 1,
			lazyLoad: true,
			loop: true,
			margin: 10,
			dots: false,
			nav: true,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`, `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`],
			responsive: {
				1360: {
					nav: true
				},
				320: {
					nav: false
				}
			}
		});

		$text.on('change.owl.carousel', function(event) {
			if (event.namespace && event.property.name === 'position') {
				var target = event.relatedTarget.relative(event.property.value, true);
				$pic.owlCarousel('to', target, 300, true);
			}
		})

		// $text.on('change.owl.carousel', function(event) {
		// 	$pic.trigger('to.owl.carousel', [event.item.index,300,true]);
		// })
		// $('.owl-carousel.middle-slider').owlCarousel({
		// 	items:1,
		// 	lazyLoad:true,
		// 	loop:true,
		// 	margin:10,
		// 	dots: true,
		// 	nav:true,
		// 	smartSpeed: 800,
		// 	navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
		// });

		$('.owl-carousel.middle-slider').owlCarousel({
			items: 1,
			lazyLoad: true,
			loop: true,
			margin: 10,
			dots: true,
			nav: true,
			smartSpeed: 800,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`, `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`],
			responsive: {
				1360: {
					nav: true
				},
				320: {
					nav: false
				}
			}
		});


		$('.slick-slider').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			appendArrows: $('.bottom-slider-nav-buttons'),
			prevArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,
			nextArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`,
			swipe: true,
			draggable: true,
			speed: 400,
			variableWidth: true,
			easing: 'ease-in-out',
			cssEase: 'ease-in-out',
			autoplay: true,
			responsive: {
				1360: {
					nav: true
				},
				320: {
					nav: false
				}
			}
		});

		$(window).scroll(function() {
			if ($(window).scrollTop() > 200) {
				$('.aside-block').fadeOut();
			} else {
				$('.aside-block').fadeIn();
			}
		});
		$('.aside-block__shedule').click(function(){

$('.aside-block').toggleClass('aside-visible');

if($('.aside-block').hasClass('aside-visible')) {
	$('.aside-block__shedule-text').text('Закрыть')
	$('.aside-block__shedule-logo').fadeOut();
	$('.hide-button').fadeIn();
}else{
	$('.aside-block__shedule-text').text('График работы');
	$('.aside-block__shedule-logo').fadeIn();
	$('.hide-button').fadeOut();
}

		});

		($('.pass').next()).click(function() {
			($(this).prev()).toggleClass('pass-visible');
			$('.pass').each(function() {
				if ($(this).hasClass('pass-visible')) {
					$(this).attr('type', 'text')
				} else {
					$(this).attr('type', 'password');
				}
			});
		});


		const form = $('.auth-block-form');

		form.find('.reg__form__input').addClass('empty_field');

		function checkInput() {
			form.find('.registration_field').each(function() {


				if ($(this).val() != '') {
					$(this).removeClass('empty_field');
				} else {
					$(this).addClass('empty_field');
				}
			});
		}

		setInterval(function() {
			checkInput();
			const sizeEmpty = form.find('.empty_field').length;

			if (sizeEmpty > 0 || !$('#reg-checkbox').prop('checked')) {

				$('.promo-form-block__form__submit.continue').attr('disabled', 'disabled');

			} else {
				$('.promo-form-block__form__submit.continue').removeAttr('disabled');
			}

		}, 500);




		$('.header__nav-bar__login-button:not(.no_js)').click(function() {
			$('body').css('overflow-y', 'hidden');
			$('.page_content').css('filter', 'blur(10px)');
			$('.auth-container').fadeIn().css('display', 'flex');
			$('.auth-block').animate({
				'right': 0
			}, 500);
		});


		$('.reg-button').click(function() {
			$('.LogIn-block, .registr-block').toggleClass('hidden-block');
		});
		// $('.promo-form-block__form__submit.continue').click(function(){
		// 	$('.registr-block, .greetings-block').toggleClass('hidden-block');
		// });

		function closeAsideForm(click_block) {
			$(click_block).click(function() {
				$('.auth-block').animate({
					'right': -500
				}, 500);
				$('body').css('overflow-y', 'inherit');
				$('.page_content').css('filter', 'none')
				$('.auth-container').fadeOut();
				$('.popUp').fadeOut();
				setTimeout(function() {
					$('.registr-block, .greetings-block').addClass('hidden-block');
					$('.LogIn-block').removeClass('hidden-block');

				}, 1000);
			});
		}
		// closeAsideForm('.login-block__form__submit');

		closeAsideForm('.close-button');


		$('.LogIn-block form').submit(function() {
			var form = $(this)[0];

			$.ajax({
				type: 'POST',
				url: form.action,
				data: $(this).serialize(),
				success: function(data) {
					if (data['name']) {
						$('.registr-block, .LogIn-block').addClass('hidden-block');
						$('.greetings-block').removeClass('hidden-block');

						$('#login_username').text(data['name']);
					} else {
						$("#login_error_text_section").show('slow');
						setTimeout(function() {
							$("#login_error_text_section").hide('slow');
						}, 2000);
					}
				},
				error: function(data) {
					console.log(data);
				}
			});
			return false;
		});

		$('#after_login_submit').click(function() {
			window.location.reload(false);
		});

		$('#register_form').submit(function() {
			var form = $(this)[0];

			$.ajax({
				type: 'POST',
				url: form.action,
				data: $(this).serialize(),
				success: function(data) {
					if (data['name']) {
						$('.registr-block, .LogIn-block').addClass('hidden-block');
						$('.greetings-block').removeClass('hidden-block');

						$('#login_username').text(data['name']);
					}
				}
			});
		});

		$('#after_login_submit').click(function() {
			window.location.reload(false);
		});
	});
</script>
<script>
	if ($(window).width() > 760) {
		var _rcct = 'aaf3f48276ea64a96e855ea733e64771461593cdac4993242473b4d25169bf10';
		! function(t) {
			var a = t.getElementsByTagName("head")[0];
			var c = t.createElement("script");
			c.type = "text/javascript";
			c.src = "//c.retailcrm.tech/widget/loader.js";
			a.appendChild(c);
		}(document);
	} else {
		var _rcct = '4fd25c0a4fe850b494e63d4099e4084b6e0916082c2056d26b3a290d9764e966';
		! function(t) {
			var a = t.getElementsByTagName("head")[0];
			var c = t.createElement("script");
			c.type = "text/javascript";
			c.src = "//c.retailcrm.tech/widget/loader.js";
			a.appendChild(c);
		}(document);
	}
</script>
<script>
	<? global $USER;
	if (!$USER->IsAdmin()) : ?>
	$(document).ready(function() {
		var popupTimer, TIME_OUT = 6 * 1000; //one minute
		// function that displays the popup
		function displayPopup() {
			if ($('.popUp').css('display') == 'block') {
				return false
			} else {
				$('body').css('overflow-y', 'hidden');
				$('.page_content, .page_wrapper').css('filter', 'blur(10px)');
				$('.popUp').fadeIn();
			}
		}
		if (!getCookie('popup')) {
			popupTimer = setTimeout(displayPopup, TIME_OUT);
		}
		$(document).on('click change keypress', function() {
			clearTimeout(popupTimer);
			if (!getCookie('popup')) {
				popupTimer = setTimeout(displayPopup, TIME_OUT);
			}
		});

		$('.close-button').click(function() {
			clearTimeout(popupTimer);
			setCookie("popup", "true", 2);
			$('body').css('overflow-y', 'inherit');
			$('.page_content, .page_wrapper').css('filter', 'none')
			$('.popUp').fadeOut();
		});
	})

	function setCookie(name, value, days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "") + expires + "; path=/";
	}

	function getCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	<? endif ?>
</script>
<script>
	$(document).ready(function() {
		$('.article-slider.owl-carousel.middle-slider').owlCarousel({
			items: 1,
			lazyLoad: true,
			loop: true,
			margin: 10,
			smartSpeed: 800,
			navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`, `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`],
			responsive: {
				1360: {

					nav: true,
					dots: true,
					center: true
				},
				320: {

					nav: false,
					dots: false,
					center: true
				}
			}
		});
	});
</script>

<!-- faq_popUp -->

<div class="popUp faq_popUp hidden-block" id="faq">
	<div class="wrapper-block">
		<div class="close-button"></div>

		<div class="accordion" id="FAQaccordion">
			<div class="card">
				<div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2>
						С каким оборудованием будут проходить тренировки? Есть ли обязательный список?
					</h2>
					<div class="icon-collapsed"></div>

				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>В тренировочном плане с резинками используются только фитнес-резинки.
В остальных тренировочных планах базовым оборудованием для выполнения тренировок являются фитнес-ленты #RAKAMAKAFIT, также в программе будут упражнения с эспандерами, грифом и фитболом. Мы подобрали упражнения на все группы мышц.</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

					<h2>
						У меня будет постоянный доступ в программу или только на 5 недель?
					</h2>
					<div class="icon-collapsed"></div>

				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Доступ в систему предоставляется на 5 недель. Отсчёт периода происходит С ПЕРВОГО ЗАХОДА на сайт ПОД СВОЕЙ УЧЁТНОЙ ЗАПИСЬЮ.
Ограничение периода мотивирует клиентов не пропускать тренировки и достигать максимальных результатов!
Система подразумевает не только доступ к системе, но и возможность консультаций с нашими кураторами в чате на сайте программы тренировок.</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

					<h2>
						Я – вегетарианец, есть ли в программе меню для меня?
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Да! Доступно пять вариантов рациона: стандартный, диабетик, вегетарианец, веган и даже без лактозы. </p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

					<h2>
						Подходит ли мне программа, если имеются ограничения по здоровью? (болят колени/ есть диастаз)
					</h2>
					<div class="icon-collapsed"></div>

				</div>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Мы предлагаем специальные программы для клиентов с проблемами коленных суставов и диастазом.
Но мы настоятельно рекомендуем вам проконсультироваться с врачом перед покупкой курса, так как все проблемы со здоровьем очень индивидуальны, и мы не несем ответственности за ваше состояние после тренировок с имеющимися у вас проблемами со здоровьем.</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					<h2>
						Сколько тренировок в неделю? Это будут определенные дни недели, или я
могу выбирать их самостоятельно? 
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Программа курса рассчитана на 3 тренировки в неделю, длительность курса 5 недель. Перерыв между тренировками – 1-2 дня для восстановления, дни для тренировок вы можете выбирать самостоятельно.</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					<h2>
						Моя цель – нарастить мышечную массу. Подходит ли мне данная программа? 
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Да, мы предлагаем различные варианты программы для набора мышечной массы и для снижения веса.
Для наилучших результатов наращивания мышечной массы мы рекомендуем использовать в упражнениях ленты и эспандеры с бОльшим сопротивлением .</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
					<h2>
						Что будет с моим доступом по окончании 5 недель? Он будет доступен или
мне необходимо вновь произвести оплату?
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Для продолжения тренировок по программе по истечении 5 недель с момента активации курса, потребуется повторная покупка курса, курс снова будет активирован на ближайшие 5 недель.</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingTen" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
					<h2>
					Каков минимально допустимый возраст для покупки курса? 
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Мы рекомендуем тренироваться по данной программе с 16 лет. </p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header collapsed" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
					<h2>
					Какова длительность одной тренировки? 
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>Одна тренировка длится 40 минут, а также 5 минут разминка и 5 минут заминка. </p>
					</div>
				</div>
			</div>
				<div class="card">
				<div class="card-header collapsed" id="headingNine" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
					<h2>
					Я могу заниматься и дома и в фитнес клубе одновременно? 
					</h2>
					<div class="icon-collapsed"></div>
				</div>
				<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#FAQaccordion">
					<div class="card-body">
						<p>
Вы можете совмещать тренировки и дома и в любом удобном для вас месте. Имейте ввиду, что нагрузка от занятий на тренажерах иная. Наша программа подготовленна специально для тех, кто тренируется дома.
Тренировки по нашей программе дома не менее эффективны, чем тренировки в зале.
</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end of faq_popUp -->

</body>

</html>