<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$items = $arResult['ITEMS'];
?>

<div class="special-offer-block">
    <div class="special-offer-block__title">
        <p class="special-offer-block__title__name">спецпредложения</p>
        <div ><a href="/catalog" class="pop-products-block__title__link-to-all">все</a></div>
    </div>
    <div class="special-offer-block__items">
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с лентами</div>
            <div class="special-offer-block__item__desc">Таким образом рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price">7980 ₽</div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с эспандерами и лентами</div>
            <div class="special-offer-block__item__desc">Комплексный анализ ситуации разнородно синхронизирует эмпирический контент</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">7980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с эспандерами, лентами и грифом</div>
            <div class="special-offer-block__item__desc">Взаимодействие корпорации и клиента спонтанно нейтрализует нишевый проект</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
    </div>
</div>