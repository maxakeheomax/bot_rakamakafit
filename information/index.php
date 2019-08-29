<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компнаии");
?>
		<!-- 	breadcrumbs block -->
		<div class="breadcrumbs">
			<div class="breadcrumbs-content">
				<div class="breadcrumbs__item">Главная </div>
				<div class="breadcrumbs__separator"> / </div>	
				<div class="breadcrumbs__item">Полезная информация </div>
				<div class="breadcrumbs__separator"> / </div>	
				<div class="breadcrumbs__item active">Как отличить подделку </div>
			</div>
		</div>
		<!-- 	 end of breadcrumbs block -->

		<!-- banner-block -->
		<div class="banner-block" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake_page.jpg); background-size:cover">
			<h1>Чем RAKAMAKAFIT <br>отличается от конкурентов</h1>
		</div>
		<!-- end of banner block -->

<!--  text-block -->
		<div class="center-block"  id="text-block">
			<h2>Натуральные материалы</h2>
			<span>Эспандеры и ленты RAKAMAKAFIT изготовлены из 100% натурального латекса. Он безвреден для аллергиков, детишек и животных. Я сама - мама, и для меня очень важно, чтобы все оборудование было безопасным для моего ребенка.</span>
			<div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
			<h2>Натуральные материалы</h2>
			<span>Эспандеры и ленты RAKAMAKAFIT изготовлены из 100% натурального латекса. Он безвреден для аллергиков, детишек и животных. Я сама - мама, и для меня очень важно, чтобы все оборудование было безопасным для моего ребенка.</span>
			<div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
			
		
			<!-- fake-detection-form -->
<div class="fake-detection-form">
	<h2>Внимание, остерегайтесь подделок! </h2>
	<span>В последнее время участились случаи продажи «наших» фитнес лент другими компаниями. Если вы столкнулись с фактом мошенничества или у вас есть замечания к качеству продукции, пожалуйста, отправьте нам свой запрос.</span>
<form action="#">
	<div class="fake-detection-form-block__form__input-wrapper">
						<label name="mail">
							<input class="promo-form-block__form__input" type="email" pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
						</label>
						<label name= fake-detection-form-textarea">
							<textarea class="promo-form-block__form__input" name="fake-detection-form-textarea" id="" cols="30" rows="10" placeholder="Введите текст"></textarea>
						</label>
						
					</div>
										<div class="promo-form-block__form__input-checkbox-wrapper">			
						<input  class="promo-form-block__form__checbox"  type="checkbox" name="" id="fake-detection-form-checkbox">
						<label for="fake-detection-form-checkbox"></label>
						<p class="promo-form-block__form__checbox-desc">Я согласен с обработкой персональных данных</p>
						
					</div>
					<button class="promo-form-block__form__submit" type="submit">отправить</button>
</form>
</div>


<!-- end of fake-detection-form -->
	<!-- end of  text-block -->
</div>
<!-- CEO-text-block -->
<div class="big-block ceo-text-block">
<div class="ceo-text-block__content">
	<div class="ceo-text-block__title">#RAKAMAKAFIT отвечает за качество</div>
	<div class="ceo-text-block__text">
	<ol>
			<li>Проверьте, что вы сделали заказ на нашем сайте rakamakafit.ru. Номер заказа первично присваивается в формате id0000 (где вместо 0000 ваш номер)</li>
			<li>После того, как вы нажали кнопку &quot;Отправить заказ&quot;, мы отправляем вам письмо-подтверждение принятого заказа на указанный e-mail с нашего официального адреса hello@rakamakafit.ru (а также kupi@rakamakafit.ru)</li>
			<li>После того, как заказ обработан менеджером, вы получите на свой телефон смс уведомление о статусе вашего заказа со ссылкой на его отслеживание. Внимание! Мы работаем с курьерской службой Ddelivery, адрес отслеживания всех заказов - ddelivery.ru или dd247.ru (и никакой другой!)</li>
			<li>Вы всегда можете позвонить нам по телефону 8 (495) 787-40-58 и узнать о статусе вашего отправления онлайн.</li>
			<li>Вся наша продукция брендирована логотипом #RAKAMAKAFIT и поставляется в фирменных сумочках!</li>
		</ol>
	</div>
</div>
</div>
<!-- end of CEO-text-block -->
<? CMain::IncludeFile( SITE_DIR.'/include/subscribe_form_yelow.php'); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>