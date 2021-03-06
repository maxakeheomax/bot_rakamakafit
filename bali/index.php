<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Розыгрыш путевки");
?>
<!-- 	breadcrumbs block -->
<? $APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	array(
		"PATH" => "",
		"SITE_ID" => SITE_ID,
		"START_FROM" => 0
	)
); ?>
<!-- 	 end of breadcrumbs block -->

<!-- banner-block -->
<div class="banner-block" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/trip_banner.jpg); background-size:cover">
	<h1>Выиграй поездку на Бали</h1>
</div>
<!-- end of banner block -->
<div class="content-block">
	<h2>Введи номер заказа</h2>
	<p class="content-block__slogan">Чтобы получить гарантированный приз и шанс выиграть путевку на двоих на самый сказочный остров Бали.</p>
	<form class="order-checked-form" action="#">
		<label for=""><input type="text" placeholder="Номер заказа"></label>
		<button>отправить</button>
	</form>
	<p class="content-block__desc">Номер заказа указан в письме, которое было отправлено на ваш e-mail вместе с буклетами. Формат номера заказа ХХХХХА или ХХХХХС, где Х - цифра. <br>
		Пример: <a class="how-start-block__item__desc__link" target="_blank" href="http://joxi.ru/5mdxBkYH31LqLm">http://joxi.ru/5mdxBkYH31LqLm</a></p>
</div>

<!-- public-offer text-block -->

<div class="bg-lightgray trip-terms">
	<div class="content-block">
		<h2>Условия проведения розыгрыша
			путевки на Бали</h2>
		<ol>
			<li>В розыгрыше путевки участвую все заказы RAKAMAKAFIT, оформленные с хх мая 2019 года.</li>
			<li>Розыгрыш путевок будет проводиться примерно 1 раз в год</li>
			<li>В каждом розыгрыше будут участвовать уникальные номера заказов. Новый розыгрыш будет осуществлен среди заказов, зарегистрированных начиная со следующего дня, после проведения предыдущего розыгрыша.</li>
			<li>К розыгрышу путевки принимаются номера заказов, которые были успешно активированы на странице акции: https://rakamakafit.ru/hochunabali</li>
			<li>Номер заказа необходимо вводить строго в формате ХХХХХА или ХХХХХС, где х - цифра. Номера заказов присваиваются менеджером при оформлении заказов. Будьте внимательны при вводе номера.</li>
			<li>За несколько дней до проведения очередного розыгрыша, все участники будут оповещены по средством SMS и/или E-MAIL о дате и времени проведения розыгрыша.</li>
			<li>Победитель розыгрыша будет выбран генератором случайных чисел среди всех зарегистрированных к моменту розыгрыша номеров заказов. Порядковые номера присваиваться не будут, выбор будет производиться по вашим номерам заказов.</li>
			<li>Розыгрыш будет проводиться в заранее оговоренное время в прямом эфире, чтобы исключить вопросы о "подтасовке" результатов.</li>
			<li>Победитель розыгрыша получает путевку на 2 взрослых на остров Бали на 10 дней. Точные даты, название отеля и условия проживания, даты и время перелета будут обговорены с победителем индивидуально.</li>
			<li>С победителем розыгрыша свяжется наш менеджер и обговорит все дальнейшие детали получения подарка.</li>
			<li>Денежный эквивалент путевки НЕ ПРЕДОСТАВЛЯЕТСЯ!</li>
		</ol>
	</div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>