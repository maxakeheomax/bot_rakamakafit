<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тренировки");
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	array(
		"PATH" => "",
		"SITE_ID" => SITE_ID,
		"START_FROM" => 0
	)
); ?>gi 
<div class="trainings_category_block">
	<div class="trainings_category_block-item" style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/exercisers_programm.jpg);   background-repeat: no-repeat;background-position: center;background-color: #ffd2d8;">
		<div class="trainings_category_block-item__title">Программа тренировок</div>
		<a href="/trainings/programm"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/free_maraphon.jpg);   background-repeat: no-repeat;background-position: center; background-color: #ffd2d8;">
		<div class="trainings_category_block-item__title">Бесплатный марафон</div>
		<a href="/trainings/free-marafone">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/exrecises.jpg);   background-repeat: no-repeat;background-position: center;background-color: #ffd2d8;">
		<div class="trainings_category_block-item__title">Упражнения</div>
		<a href="/trainings/exercises">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/articles.jpg);   background-repeat: no-repeat;background-position: center;background-color: #ffd2d8;">
		<div class="trainings_category_block-item__title">Статьи</div>
		<a href="/trainings/articles"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

