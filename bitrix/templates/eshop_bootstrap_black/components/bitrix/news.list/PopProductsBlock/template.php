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

<div class="pop-products-block">
    <div class="pop-products-block__title">
        <p class="pop-products-block__title__name">Популярные товары</p>
        <!-- <div ><a href="/catalog" class="pop-products-block__title__link-to-all">все</a></div> -->
    </div>
    <div class="pop-products-block__items">
        <!-- cycle start -->
        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/ipad-03.jpg" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span">Программа тренировок Rakamakafit Online</span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price">5980 ₽</div>
                <div class="pop-products-block__item__old-price">7980 ₽</div>
                <div class="pop-products-block__item-cart"></div>
            </div>
        </div>
        <!-- cycle end -->

        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/fitball-01.jpg" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span">Фитбол Rakamakafit</span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price">1370 ₽</div>
                <div class="pop-products-block__item__old-price"></div>
                <div class="pop-products-block__item-cart"></div>
            </div>
        </div>
        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/lenti-tubus.jpg" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span">5 фитнес лент в удобной упаковке</span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price">5980 ₽</div>
                <div class="pop-products-block__item__old-price"></div>
                <div class="pop-products-block__item-cart"></div>
            </div>
        </div>
        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/diary.jpg" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span">Дневник питания</span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price">680 ₽</div>
                <div class="pop-products-block__item__old-price"></div>
                <div class="pop-products-block__item-cart"></div>
            </div>
        </div>
        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/grif-01.jpg" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span">Фитнес гриф Rakamakafit</span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price">7980 ₽</div>
                <div class="pop-products-block__item__old-price"></div>
                <div class="pop-products-block__item-cart"></div>
            </div>
        </div>
    </div>
</div>