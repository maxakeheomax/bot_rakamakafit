<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
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

<div class="banner-block" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/payment.jpg); background-size:cover">
			<h1>Оплата</h1>
		</div>

        <div id="text-block">
			<h2>Стоимость курьерской доставки (Boxberry, DPD, IML, Logsis, СДЭК):</h2>
			<ul>
				<li>Москва и МО - 350р</li>
				<li>Санкт-Петербург - 350р</li>
				<li>Остальные регионы - в зависимости от адреса</li>
			</ul>
			<h2>Стоимость доставки Почтой России</h2>
			<span>Расчитывается автоматически в зависимости от выбранного адреса на сайте при оформлении заказа. Если по выбранному адресу нет вариантов доставки, пожалуйста, свяжитесь с нами напрямую kupi@rakamakafit.ru и мы найдем решение.</span>

			<h2>Самовывоз г.Москва</h2>
			<span>Для того, чтобы забрать товар с нашего склада, необходимо его предварительно оплатить на нашем сайте. Мы гарантируем безопасность вашего платежа, так как работаем со Sberbank Online.</span>
        </div>
        
    <div class="bottom-text-block">
        
        <div class="divide-line"></div>
        <span>Если у вас возникли сложности при оформлении заказа, пожалуйста, свяжитесь с нами в онлайн чате или напишите на <a class="pink_text" href="mailto:kupi@rakamakafit.ru"><u>kupi@rakamakafit.ru</u></a></span>
        <span style="margin:35px 0">RAKAMAKAFIT заботится о том, чтобы вы получили заказ в кратчайший срок.<p></p>
        <span>Вопросы по качеству доставки?  <br>Служба контроля качества всегда ответит на ваш вопрос:<br> <a href="tel:+79638656567">+7 963 865-65-67</a></span>
        <!-- feedback-logos-block -->
        <div class="feedback-logos-block">
            <ul>
                <a href="#"><li style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/viber.png);background-size: cover;"></li></a>
                <a href="#"><li style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/whatsApp.png);background-size: cover;"></li></a>
                <a href="#"><li style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/tlgrm.png);background-size: cover;"></li></a>
            </ul>
        </div>
        <!-- end of feedback-logos-block -->
    </span>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>