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

// $APPLICATION->AddHeadScript(__DIR__."/");

$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$item = $arResult['ITEMS'][ count($arResult['ITEMS'])-1 ];
$item_properties = CIBlockElement::GetByID($item['ID'])->GetNextElement()->GetProperties();
$item
?>

<div class="special-offer-block">
    <div class="special-offer-block__title">
        <p class="special-offer-block__title__name">Наборы с программой тренировок</p>
        <div class="special-offer-block__title__link-to-all">все</div>
    </div>
    <div class="special-offer-block__items">
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
            <div class="special-offer-block__item__title">Персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</div>

            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price">7980 ₽</div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
            <div class="special-offer-block__item__title">Набор эспандеров + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">7980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
            <div class="special-offer-block__item__title">Набор эспандеры + ленты + гриф + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</div>

            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
    </div>
</div>