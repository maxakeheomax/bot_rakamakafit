<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Программа тренировок");
?>

<!-- upSlider -->
<div class="up-block">
	<div class="up-slider-wrapper">
		<div class="up-slider owl-theme">
			<div class="owl-carousel__up-up-slider-item">
				<div class="owl-carousel__up-slider-item__slider-content">
					<p class="owl-carousel__up-slider-item__slider-content__promo-title">Красивое тело за пять недель - это реально!</p>
					<p class="owl-carousel__up-slider-item__slider-content__slogan">Кардинальное преображение ждет тебя в персональной программе тренировок и питания  от Насти RAKAMAKAFIT </p>
					<div class="trainings_owl-carousel__up-slider__content_bottom">
						<a href="#complects">
							<div class="owl-carousel__slider-item-button">
								<span class="owl-carousel__slider-item-button__text">Получить</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="trainings img-wrapper" style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/maraphon.jpg);background-size: cover">

	</div>
</div>
<!-- end of up slider -->
<!-- special offer -->
<div class="training special-offer-block" id="complects">
	<div class="special-offer-block__title">
		<p class="special-offer-block__title__name">Наборы с программой тренировок</p>
		<div class="special-offer-block__title__link-to-all">все</div>
	</div>
	<div class="special-offer-block__items">
		<div class="special-offer-block__item">
			<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
				<div class="special-offer-block__item__title">
					<p>Персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p>
				</div>
			</a>
			<div class="special-offer-block__item__prices">
				<div class="special-offer-block__item__price">5980 ₽</div>
				<div class="special-offer-block__item__old-price">7980 ₽</div>
				<a href="#">
					<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div>
				</a>
			</div>
		</div>
		<div class="special-offer-block__item">
			<a href="#"> <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
				<div class="special-offer-block__item__title">
					<p>Набор эспандеров + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p>
				</div>
			</a>
			<div class="special-offer-block__item__prices">
				<div class="special-offer-block__item__price">7980 ₽</div>
				<div class="special-offer-block__item__old-price"></div>
				<a href="#">
					<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div>
				</a>
			</div>
		</div>
		<div class="special-offer-block__item">
			<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
				<div class="special-offer-block__item__title">
					<p>Набор эспандеры + ленты + гриф + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p>
				</div>
			</a>

			<div class="special-offer-block__item__prices">
				<div class="special-offer-block__item__price">5980 ₽</div>
				<div class="special-offer-block__item__old-price"></div>
				<a href="#">
					<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- end of special offer -->
<!-- promo-train-block -->

<div class="blue-bg promo-train-block__slider-item">
	<div class="promo-train-block__slider-item__slider-content">
		<p class="promo-train-block__slider-item__slider-content__slogan"><span class="promo-train-block__title_underline-block-up">5 недель</span> ежедневной <span class="promo-train-block__title_underline-block-up">работы над собой</span></p>
		<p class="promo-train-block__slider-item__slider-content__dicription">После заполнения анкеты, мы формируем для тебя индивидуальный курс тренировок и питания.</p>
		<p class="promo-train-block__slider-item__slider-content__dicription">Тебя ждет 4 тренировки в неделю, программа питания на каждый день, мотивационные лекции и статьи, удобное отслеживание результатов.</p>
		<div class="promo-train-block__slider__content_bottom">
			<a href="#complects">
				<div class="promo-train-block__slider-item-button">
					<span class="promo-train-block__slider-item-button__text">Купить</span>
				</div>
			</a>
			<div class="promo-train-block__slider-item-more">
				<p class="promo-train-block__slider-item-more__text">80% упражнений проходят с эспандерами и фитнес лентами RAKAMAKAFIT</p>
			</div>
		</div>
	</div>
</div>
<!-- end of promo-train-block -->
<!-- how to start block -->
<div class="white-bg how-start-block">
	<div class="how-start-block__content">
		<div class="how-start-block__item">
			<div class="how-start-block__item__number">1</div>
			<div class="how-start-wprapper-block">
				<div class="how-start-block__item__title">Самые эффективные тренировки</div>
				<div class="how-start-block__item__desc">Авторский курс видео-упражнений для максимально достижения результата. Ты хочешь похудеть или набрать массу? У тебя варикоз, диастаз или болят колени? Все это мы учтем!
				</div>
			</div>
		</div>
		<div class="how-start-block__item">
			<div class="how-start-block__item__number">2</div>
			<div class="how-start-wprapper-block">
				<div class="how-start-block__item__title">Разумное питание</div>
				<div class="how-start-block__item__desc">Рацион на каждый день с учетом твоих индивидуальных предпочтений. Доступно целых 5 программ: стандартная, диабетик, вегетарианец, веган, без лактозы. Бонусом я поделюсь с тобой базой вкусных и полезных рецептов.</div>
			</div>
		</div>
		<div class="how-start-block__item">
			<div class="how-start-block__item__number">3</div>
			<div class="how-start-wprapper-block">
				<div class="how-start-block__item__title">Результат, которого ждешь</div>
				<div class="how-start-block__item__desc">В личном кабинете ты сможешь добавлять отчеты о своих изменениях. Это позволит отслеживать результаты и развивать дисциплину.</div>
			</div>
		</div>

	</div>

</div>

<!-- promo-train-block -->

<div class="left-side promo-train-block__slider-item">
	<div class="promo-train-block__slider-item__slider-content">
		<p class="promo-train-block__slider-item__slider-content__slogan"><span class="promo-train-block__title_underline-block-up">5 недель доступа</span><br /> к программе тренировок</p>
		<p class="promo-train-block__slider-item__slider-content__dicription">После заполнения анкеты, тебе откроется доступ в личный кабинет с курсом еженедельных тренировок, индивидуальный план питания, мотивационные лекции и статьи, удобное отслеживание результатов. </p>
		<div class="promo-train-block__slider__content_bottom">
			<a href="#complects">
				<div class="promo-train-block__slider-item-button">
					<span class="promo-train-block__slider-item-button__text">Купить</span>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- end of promo-train-block -->
<!-- Hello-block -->
<div class="hello-block">
	<div class="hello-block__content">
		<div class="hello-block__content__hello">
			<div class="hello-block__content__hello__img">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/hello-img.jpg" alt="">
			</div>

			<div class="hello-block__content__hello__desc">
				<div class="hello-block__content__hello__desc__title">
					<p class="hello-block__content__hello__desc__title__main">Привет! Меня зовут Настя, я рада нашему знакомству!</p>
				</div>
				<div class="hello-block__content__hello__text">
					<p>Хм..тут надо сказать пару слов о себе, да? Тогда начну с того, что по первому образованию я журналист. Второе образование –колледж фитнеса и бодибилдинга им. Бена Вейдера по специальности тренер и нутрициолог.</p>
					<p>После рождения дочки я, как большинство девушек, мечтала скорее прийти в форму, но возможности ходить в тренажерный зал не было. Эффективно заниматься дома без громоздкого и дорогостоящего «железа» мне помогли эспандеры.</p>
					<p>Спустя некоторое время я начала вести свой блог в Instagram, в котором рассказывала, как прийти в форму не выходя из дома, провела более 6 бесплатных марафонов трансформации тела, выпустила свое фирменное оборудование – яркие фитнес ленты и эспандеры RAKAMAKAFIT. Меня мотивирует любовь к своему делу и ваши потрясающие результаты!</p>
					<p>В программу тренировок и питания RAKAMAKAFIT ONLINE я вложила всю свою душу и знания! Буду рада видеть тебя в своей команде спортивных и жизнерадостных!</p>
					<div class="hello-block__content__hello__text__link-wrapper">
						<a target="_blank" class="hello-block__content__hello__text__link" href="http://www.instagram.com/rakamakafit" class="link">Читай мой блог в <span class="underline-block">инстаграмме</span></a>
						<a target="_blank" href="http://www.instagram.com/rakamakafit">
							<img src="<?= SITE_TEMPLATE_PATH ?>/assets/hello-block-inst.svg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of Hello-block -->
<!-- FAQ block -->
<div class="faq-block" id="popUp_call">
	<div class="faq-block__left-block">
		<div class="faq-block__left-block__title">F.A.Q</div>
		<div class="faq-block__left-block__arrow"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/faq-arrow.svg" alt=""></div>
	</div>
	<div class="faq-block__right-block">
		<div class="faq-block__right-block__desc">Кликни, чтобы узнать ответы на часто задаваемые вопросы</div>
	</div>
</div>
<!-- end of FAQ block -->
<script>
	$('#popUp_call').click(function() {
		$('body').css('overflow-y', 'hidden');
		$('.page_content').css('filter', 'blur(10px)');
		$('#faq').fadeIn();
	});

	// $('.close-button').click(function() {
	// 	$('body').css('overflow-y', 'inherit');
	// 	$('.page_content').css('filter', 'none')
	// 	$('#faq').fadeOut();
	// 	$('.popUp.faq_popUp').hide();
	// })
</script>

<?
CModule::IncludeModule("iblock");
$iblock_id = CIBlock::GetList(array(), array("CODE" => "instagram", "TYPE" => "banner"))->Fetch()['ID'];
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"BottomSlider",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => $iblock_id,
		"IBLOCK_TYPE" => "banner",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>


<script>
	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {

		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
			location.hostname == this.hostname
		) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

			if (target.length) {
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
			}
		}
	});
</script>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>