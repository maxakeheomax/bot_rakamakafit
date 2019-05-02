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
        <div class="special-offer-block__title__link-to-all">все</div>
    </div>
    <? foreach ($items as $item): ?>
        <div class="special-offer-block__items">
            <div class="special-offer-block__item">
                <img src="<?=CFile::GetPath($iblock["PICTURE"]);?>" alt="">
                <div class="special-offer-block__item__title"><?= $item['NAME']?></div>
                <div class="special-offer-block__item__desc"><?= $item['DETAIL_TEXT']?></div>
                <div class="special-offer-block__item__prices">
                    <div class="special-offer-block__item__price"><?= $item['PRICE']?></div>
                    <div class="special-offer-block__item__old-price"><?= $item['OLD_PRICE']?></div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    </div>
</div>