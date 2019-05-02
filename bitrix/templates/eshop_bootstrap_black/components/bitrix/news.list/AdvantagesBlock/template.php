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

<div class="advantages-block">
    <!-- cycle start -->
    <div class="advantages-block__item">
        <div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/cloud.svg" alt=""></div>
        <div class="advantages-block_disc">Тренируйся где угодно</div>
    </div>
    <!-- cycle end -->

    <div class="advantages-block__item">
        <div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/fire.svg" alt=""></div>
        <div class="advantages-block_disc">Самые горячие упражнения</div>
    </div>
    <div class="advantages-block__item">
        <div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/diamond.svg" alt=""></div>
        <div class="advantages-block_disc">Гарантия 90 дней <br>и простой возврат</div>
    </div>
    <div class="advantages-block__item">
        <div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/heart.svg" alt=""></div>
        <div class="advantages-block_disc">Безопасный двусторонний латекс</div>
    </div>
</div>