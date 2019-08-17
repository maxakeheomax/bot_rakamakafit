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

<div class="owl-carousel middle-slider owl-theme promo-train-block__slider-item" >
    <? foreach ($items as $item): ?>
        <?foreach ($item['DISPLAY_PROPERTIES']['PRODUCT']['LINK_ELEMENT_VALUE'] as $arTovar):?>
        <?
        $url_page = $arTovar['DETAIL_PAGE_URL'];
        $arTorPreds = CCatalogSKU::getOffersList($arTovar['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
        foreach ($arTorPreds as $arTorPred){
            $url = '/personal/cart/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
        }
        ?>
        <?endforeach;?>
        <div class="promo-train-block__slider-item__slider-content">
            <p class="promo-train-block__slider-item__slider-content__promo-title"><?=$item['NAME']?></p>
            <p class="promo-train-block__slider-item__slider-content__slogan"><?= $item['~PREVIEW_TEXT']?></p>
            <p class="promo-train-block__slider-item__slider-content__description"><?=$item['~DETAIL_TEXT']?></p>
            <div class="promo-train-block__slider__content_bottom">
                <div class="promo-train-block__slider-item-button">
                    <a href="<?=$url?>" class="promo-train-block__slider-item-button__text">Купить</a>
                </div>
                <div class="promo-train-block__slider-item-more">
                    <a href="<?=$url_page?>" class="promo-train-block__slider-item-more__text">Подробнее</a>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>