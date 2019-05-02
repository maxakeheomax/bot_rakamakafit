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

<div class="bottom-slider-block">
    <div class="bottom-slider-block__slider-header">
        <div class="bottom-slider-block__slider-header_top-content">
            <div class="bottom-slider-block__slider-header__left-block">
                <p class="bottom-slider-block__slider-header__left-block__slogan">стань частью <span class="bottom-slider-block__slider-header__left-block__slogan__underline-block-up">@rakamaka.fit</span></p>
                <img class="bottom-slider-block__slider-header__left-block__logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-inst.svg" alt="">
            </div>
            <div class="bottom-slider-block__slider-header__right-block">
                <div class="bottom-slider-block__slogan-button-wrapper">
                    <p class="bottom-slider-block__slider-header__right-block__slogan">Фото счастливых клиентов RAKAMAKAFIT
                        и участниц марафона трансформации тела RAKAMAKAFON</p>
                    <button class="bottom-slider-block____slider-header__right-block__slogan-button">смотреть</button>
                </div>
            </div>
        </div>
        <img class="bottom-slider-block____slider-header__right-block_img" src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-hashtag.svg" alt="">
    </div>
    <div class="bottom-slider-block__slider-footer"></div>
    <div class="bottom-slider-block__slider-wrapper">
        <div class="slick-slider">
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-1.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-1.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-2.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-1.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-2.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-1.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-2.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-2.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-1.jpg" alt=""></div>
            <div><img src="<?= SITE_TEMPLATE_PATH ?>/assets/bottom-slider-img-2.jpg" alt=""></div>
        </div>
        <div class="bottom-slider-nav-buttons"></div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.owl-carousel.up-slider').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            margin:10,
            dots: false,
            nav:true,
            navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
        });

        $('.owl-carousel.middle-slider').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            margin:10,
            dots: true,
            nav:true,
            navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
        });

        $('.owl-carousel.bottom-slider').owlCarousel({
            items:5,
            stagePadding: 60,
            lazyLoad:true,
            loop:true,
            autoplay:true,
            margin:10,
            dots: false,
            nav:true,
            navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`]
        });

        $('.slick-slider').slick({
            slidesToShow:3,
            slidesToScroll: 1,
            arrows: true,
            appendArrows: $('.bottom-slider-nav-buttons'),
            prevArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-left.svg">`,
            nextArrow: `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/arrow-white-right.svg">`,
            swipe:true,
            draggable: true,
            variableWidth: true,
            easing: 'ease-in-out',
            cssEase: 'ease-in-out',
            autoplay: true
        });
    });
</script>