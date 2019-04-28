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
<!--<pre>-->
<!--</pre>-->

<div class="up-block">
	<div class="up-slider-wrapper">
		<div class="owl-carousel up-slider owl-theme">
			<? foreach ($items as $item): ?>
			<div class="owl-carousel__up-up-slider-item">
				<div class="owl-carousel__up-slider-item__slider-content">
					<p class="owl-carousel__up-slider-item__slider-content__promo-title"> <?= $item['NAME']?></p> 
					<p class="owl-carousel__up-slider-item__slider-content__slogan"><?= $item['PREVIEW_TEXT']?></p>
					<div class="owl-carousel__up-slider__content_bottom">
						<div class="owl-carousel__slider-item-button">
							<span class="owl-carousel__slider-item-button__text">Купить</span>
						</div>
					</div>
				</div>
			</div>

			<? endforeach; ?>			
		</div>
	</div>
	<div class="img-wrapper">
		<img src="<?=CFile::GetPath($iblock["PICTURE"]);?>" alt="">
	</div>
</div>

<!-- main slider -->
<div class="owl-carousel middle-slider owl-theme">
    <? foreach ($items as $item): ?>
        <div class="owl-carousel__slider-item" style="background: url('<?=CFile::GetPath($iblock["PICTURE"]);?>');background-size: 100% 100%; ">
            <div class="owl-carousel__slider-item__slider-content">
                <p class="owl-carousel__slider-item__slider-content__promo-title"><?= $item['NAME']?></p>
                <p class="owl-carousel__slider-item__slider-content__slogan"><?= $item['PREVIEW_TEXT']?></p>
                <p class="owl-carousel__slider-item__slider-content__dicription"><?= $item['DETAIL_TEXT']?></p>
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
    <? endforeach; ?>
</div>

<!-- special offer -->
<div class="special-offer-block">
    <div class="special-offer-block__title">
        <p class="special-offer-block__title__name">спецпредложения</p>
        <div class="special-offer-block__title__link-to-all">все</div>
    </div>
    <div class="special-offer-block__items">
        <div class="special-offer-block__item">
            <img src="assets/offer-3.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с лентами</div>
            <div class="special-offer-block__item__desc">Таким образом рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price">7980 ₽</div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="assets/offer-2.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с эспандерами и лентами</div>
            <div class="special-offer-block__item__desc">Комплексный анализ ситуации разнородно синхронизирует эмпирический контент</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">7980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
        <div class="special-offer-block__item">
            <img src="assets/offer-1.jpg" alt="">
            <div class="special-offer-block__item__title">Новогодний набор с эспандерами, лентами и грифом</div>
            <div class="special-offer-block__item__desc">Взаимодействие корпорации и клиента спонтанно нейтрализует нишевый проект</div>
            <div class="special-offer-block__item__prices">
                <div class="special-offer-block__item__price">5980 ₽</div>
                <div class="special-offer-block__item__old-price"></div>
            </div>
        </div>
    </div>
</div>
