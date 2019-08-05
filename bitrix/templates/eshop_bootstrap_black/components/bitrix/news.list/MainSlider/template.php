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
$items = $arResult['ITEMS'];


?>

<div class="owl-carousel middle-slider owl-theme">
    <? foreach ($items as $item): ?>
    <? ?>
        <div class="owl-carousel__slider-item"
             style="background: url('<?= CFile::GetPath($item['PROPERTIES']['PICTURE']['VALUE']); ?>');background-size: 100% 100%; ">
            <div class="owl-carousel__slider-item__slider-content">
                <p class="promo-train-block__slider-item__slider-content__promo-title"><?= $item['NAME']?></p>
                <p class="owl-carousel__slider-item__slider-content__slogan"><?= $item['PROPERTIES']['TEXT1']['VALUE']['TEXT']?></p>
                <p class="owl-carousel__slider-item__slider-content__dicription"><?= $item['PROPERTIES']['TEXT2']['VALUE']['TEXT']?></p>
                <div class="owl-carousel__slider__content_bottom">
                    <div class="owl-carousel__slider-item-button">
                        <span class="owl-carousel__main-slider-item-button__text">Купить</span>
                    </div>
                    <div class="owl-carousel__slider-item-more">
                        <span class="owl-carousel__slider-item-more__text">Подробнее</span>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>    
</div>
