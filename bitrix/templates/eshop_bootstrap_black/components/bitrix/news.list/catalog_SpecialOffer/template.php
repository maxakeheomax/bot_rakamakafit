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


<div class="mixit owl-carousel middle-slider owl-theme">
    <? foreach($items as $item): ?>
        <div class="owl-carousel__slider-item"
            style="background: url('<?= $item['PREVIEW_PICTURE']['SRC'] ?>');background-size: 100% 100%; ">
            <?
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="owl-carousel__slider-item__slider-content">
                <p class="owl-carousel__slider-item__slider-content__promo-title"><?= $item['NAME'] ?>
                    <span class="promo-form-block__title_underline-block">в подарок</span></p>

                <p class="owl-carousel__slider-item__slider-content__dicription"><?= $item['PREVIEW_TEXT'] ?></p>
            </div>
        </div>
    <? endforeach; ?>
</div>
