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

<div class="up-block">
    <div class="up-slider-wrapper">
        <div class="up-slider owl-theme">
            <div class="owl-carousel__up-up-slider-item">
                <div class="owl-carousel__up-slider-item__slider-content">
                    <p class="owl-carousel__up-slider-item__slider-content__promo-title">Красивое тело за пять недель - это реально!</p>
                    <p class="owl-carousel__up-slider-item__slider-content__slogan">Кардинальное преображение ждет тебя в персональной программе тренировок и питания от Насти RAKAMAKAFIT </p>
                    <div class="owl-carousel__up-slider__content_bottom">
                        <div class="owl-carousel__slider-item-button">
                            <span class="owl-carousel__slider-item-button__text">Получить</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img-wrapper">
        <img src="<?= CFile::GetPath( $item_properties['IMAGE']['VALUE'] ) ?>" alt="">
    </div>
</div>

