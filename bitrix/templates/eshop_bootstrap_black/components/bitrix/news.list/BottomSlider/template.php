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
// $this->setFrameMode(true);

$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
// echo '<pre>'; var_dump( $iblock); echo '</pre>';
$items = $arResult['ITEMS'];
?>
<?
// echo '<pre>'; var_dump( $items); echo '</pre>';
?>

<div class="bottom-slider-block">
    <div class="bottom-slider-block__slider-header">
        <div class="bottom-slider-block__slider-header_top-content">
            <div class="bottom-slider-block__slider-header__left-block">
                <p class="bottom-slider-block__slider-header__left-block__slogan">стань частью <span class="bottom-slider-block__slider-header__left-block__slogan__underline-block-up">@rakamaka.fit</span></p>
                <img class="bottom-slider-block__slider-header__left-block__logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-inst.svg" alt="">
            </div>
            <div class="bottom-slider-block__slider-header__right-block">
                <div class="bottom-slider-block__slogan-button-wrapper">
                    <p class="bottom-slider-block__slider-header__right-block__slogan"><?= $iblock['DESCRIPTION'] ?></p>
                    <a href="#"><button class="bottom-slider-block____slider-header__right-block__slogan-button">смотреть</button></a>
                </div>			
            </div>
        </div>
        <a href="" id=""><img class="bottom-slider-block____slider-header__right-block_img" src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-inst.svg" alt=""></a>
    </div>
    <div class="bottom-slider-block__slider-footer"></div>
    <div class="bottom-slider-block__slider-wrapper">
        <div class="slick-slider">
            <? foreach($items as $item): ?>
                <div><img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt=""></div>
            <? endforeach;?>
        </div>
        <div class="bottom-slider-nav-buttons"></div>
    </div>
</div>



