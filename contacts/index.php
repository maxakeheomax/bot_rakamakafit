<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	Array(
		"PATH" => "",
		"SITE_ID" => SITE_ID,
		"START_FROM" => 0
	)
);?> 

<div class="banner-block" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/contacts.jpg); background-size:cover">
			<h1>Контакты</h1>
		</div>
		<div class="contacts big-width-block center-block">

<div class="contacts-text-block">
	<div class="contacts-tetx-block-row">
		<div class="text-block-item">
			<h2>Адрес склада</h2>
			<p>111020, Москва, Юрьевский переулок, дом 13А, стр.2 </p>
		</div>
		<div class="text-block-item">
			<h2>Режим работы</h2>
			<p>ежедневно с 10:00 до 20:00</p>
		</div>
	</div>
	<div class="contacts-tetx-block-row">
		<div class="text-block-item">
			<h2>Юридический адрес</h2>
			<p>119261, Москва, Ленинский проспект 85</p>
		</div>
		<div class="text-block-item">
			<h2>Для справок</h2>
			<p>8 (495) 787-40-58
				</p><p>hello@rakamakafit.ru</p>
			</div>
		</div> 

		<!-- map-block -->

		<div class="map-block">	
			<div class="map-block-header">	
				<h2>На карте</h2>
				<div class="map-block-tabs">
					<ul>
						<a class="map-block__tab active" id="actual_addr">
							<li>
								Адрес склада
							</li>
						</a>
						<a class="map-block__tab" id="legal_addr"><li>
							Юридический адрес
						</li>
					</a>
				</ul>
			</div>
		</div>
		<div class="img-link-block" id="actual_addr">
			<div class="img-container" style="background:url(assets/map.jpg);background-size: cover;"></div>
		</div>
		<div class="img-link-block hidden-block" id="legal_addr">
			<div class="img-container" style="background:url(assets/map_1.jpg);background-size: cover;"></div>
		</div>
	</div>




	<!-- end-of-map-block -->




	<!-- fake-detection-form -->
	<div class="fake-detection-form">
		<h2>Появились вопросы? Пишите нам! </h2>
		<form action="#">
			<div class="fake-detection-form-block__form__input-wrapper">
				<label name="mail">
					<input class="promo-form-block__form__input" type="email" pattern="\S+@[a-z]+.[a-z]+" placeholder="Email">
				</label>
				<label name="fake-detection-form-textarea&quot;">
					<textarea class="promo-form-block__form__input" name="fake-detection-form-textarea" id="" cols="30" rows="10" placeholder="Введите текст"></textarea>
				</label>

			</div>
			<div class="promo-form-block__form__input-checkbox-wrapper">			
				<input class="promo-form-block__form__checbox" type="checkbox" name="" id="promo-checkbox">
				<label for="promo-checkbox"></label>
				<p class="promo-form-block__form__checbox-desc">Я согласен с обработкой персональных данных</p>

			</div>
			<button class="promo-form-block__form__submit" type="submit">отправить</button>
		</form>
	</div>


	<!-- end of fake-detection-form -->
	<!-- end of  text-block -->
</div>


<!-- footer -->
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>