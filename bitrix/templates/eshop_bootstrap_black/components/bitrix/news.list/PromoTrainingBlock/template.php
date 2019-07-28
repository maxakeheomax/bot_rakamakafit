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

<div class="promo-train-block__slider-item" >
    <div class="promo-train-block__slider-item__slider-content">
        <p class="promo-train-block__slider-item__slider-content__promo-title">программа тренировок</p>
        <p class="promo-train-block__slider-item__slider-content__slogan">При покупке любого оборудования Rakamakafit - <span class="promo-train-block__title_underline-block-up"> 7-дневный доступ<br> к программе в подарок</span> </p>
        <p class="promo-train-block__slider-item__slider-content__description">Тебя ждет от 4 тренировки в неделю, программа питания на каждый день, мотивационные лекции и статьи, удобное отслеживание результатов.</p>
        <div class="promo-train-block__slider__content_bottom">
            <div class="promo-train-block__slider-item-button">
                <span class="promo-train-block__slider-item-button__text">Купить</span>
            </div>
            <div class="promo-train-block__slider-item-more">
                <span class="promo-train-block__slider-item-more__text">Подробнее</span>
            </div>
        </div>
    </div>
</div>