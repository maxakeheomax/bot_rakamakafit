<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тренировки");
?>
<div class="trainings_category_block">
	<div class="trainings_category_block-item" style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/main-trainings.jpg); background-size: cover">
		<div class="trainings_category_block-item__title">Программа тренировок</div>
		<a href="/trainings/programm"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/main-trainings.jpg); background-size: cover">
		<div class="trainings_category_block-item__title">Бесплатный марафон</div>
		<a href="/trainings/free-marafone">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/main-trainings.jpg); background-size: cover">
		<div class="trainings_category_block-item__title">Упражнения</div>
		<a href="/trainings/exercises">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
	<div class="trainings_category_block-item"style="background: url(<?= SITE_TEMPLATE_PATH ?>/assets/main-trainings.jpg); background-size: cover">
		<div class="trainings_category_block-item__title">Статьи</div>
		<a href="/trainings/articles"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">перейти</span></div></a>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

