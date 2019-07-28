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

<div class="promo-train-block__slider-item" >
    <div class="promo-train-block__slider-item__slider-content">
        <p class="promo-train-block__slider-item__slider-content__slogan"><span class="promo-train-block__title_underline-block-up">5 недель</span> ежедневной <span class="promo-train-block__title_underline-block-up">работы над собой</span></p>
        <p class="promo-train-block__slider-item__slider-content__dicription">После заполнения анкеты, мы формируем для тебя индивидуальный курс тренировок и питания.</p>
        <p class="promo-train-block__slider-item__slider-content__dicription">Тебя ждет 4 тренировки в неделю, программа питания на каждый день, мотивационные лекции и статьи, удобное отслеживание результатов.</p>
        <div class="promo-train-block__slider__content_bottom">
            <div class="promo-train-block__slider-item-button">
                <span class="promo-train-block__slider-item-button__text">Купить</span>
            </div>
            <div class="promo-train-block__slider-item-more">
                <span class="promo-train-block__slider-item-more__text">80% упражнений проходят с эспандерами и фитнес лентами RAKAMAKAFIT</span>
            </div>
        </div>
    </div>
</div>