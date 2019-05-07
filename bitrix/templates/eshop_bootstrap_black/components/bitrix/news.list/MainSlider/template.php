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
    <div class="owl-carousel__slider-item" style="background: url('<?= SITE_TEMPLATE_PATH ?>/assets/slider-bg.jpg'); background-size: 100% 100%; ">
        <div class="owl-carousel__slider-item__slider-content">
            <p class="owl-carousel__slider-item__slider-content__promo-title">Твой фитнес клуб в сумочке</p>
            <p class="owl-carousel__slider-item__slider-content__slogan">Прочные и широкие фитнес ленты</p>
            <p class="owl-carousel__slider-item__slider-content__dicription">легко брать с собой,  комбинировать друг с другом и прорабатывать все группы мышц. С резинками Rakamakafit из натурального латекса заниматься дома или на свежем воздухе можно в любую минуту.</p>
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
    <div class="owl-carousel__slider-item" style="background: url('<?= SITE_TEMPLATE_PATH ?>/assets/slider-bg.jpg'); background-size: 100% 100%; ">
        <div class="owl-carousel__slider-item__slider-content">
            <p class="owl-carousel__slider-item__slider-content__promo-title">Твой фитнес клуб в сумочке</p>
            <p class="owl-carousel__slider-item__slider-content__slogan">Прочные и широкие фитнес ленты</p>
            <p class="owl-carousel__slider-item__slider-content__dicription">легко брать с собой, комбинировать друг с другом и прорабатывать все группы мышц. С резинками Rakamakafit из натурального латекса заниматься дома или на свежем воздухе можно в любую минуту.</p>
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
    <div class="owl-carousel__slider-item" style="background: url('<?= SITE_TEMPLATE_PATH ?>/assets/slider-bg.jpg'); background-size: 100% 100%; ">
        <div class="owl-carousel__slider-item__slider-content">
            <p class="owl-carousel__slider-item__slider-content__promo-title">Твой фитнес клуб в сумочке</p>
            <p class="owl-carousel__slider-item__slider-content__slogan">Прочные и широкие фитнес ленты</p>
            <p class="owl-carousel__slider-item__slider-content__dicription">легко брать с собой,  комбинировать друг с другом и прорабатывать все группы мышц. С резинками Rakamakafit из натурального латекса заниматься дома или на свежем воздухе можно в любую минуту.</p>
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
</div>