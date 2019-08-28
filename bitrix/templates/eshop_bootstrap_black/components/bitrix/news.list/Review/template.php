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
?>


<!-- main sider -->
<div class="feedback difference-block__title">Отзывы</div>
<div class="feedback owl-carousel middle-slider owl-theme">
    <? foreach ($arResult['ITEMS'] as $item): ?>
    <div class="owl-carousel__slider-item" >
        <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
    </div>
    <? endforeach ?>
</div>
