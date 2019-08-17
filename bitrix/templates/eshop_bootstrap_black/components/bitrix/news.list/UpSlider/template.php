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

<div class="up-block">
	<div class="up-slider-wrapper">
		<div class="owl-carousel up-slider owl-theme">
			<? foreach ($items as $item): ?>
            <?foreach ($item['DISPLAY_PROPERTIES']['TOVAR']['LINK_ELEMENT_VALUE'] as $arTovar):?>
                <?
                $url_page = $arTovar['DETAIL_PAGE_URL'];
                /*$arTorPreds = CCatalogSKU::getOffersList($arTovar['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
                foreach ($arTorPreds as $arTorPred){
                    $url = '/catalog/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
                }*/
                ?>
            <?endforeach;?>
			<div class="owl-carousel__up-up-slider-item">
				<div class="owl-carousel__up-slider-item__slider-content">
					<p class="owl-carousel__up-slider-item__slider-content__promo-title"><?= $item['NAME']?></p>
					<p class="owl-carousel__up-slider-item__slider-content__slogan"><?= $item['PREVIEW_TEXT']?></p>
					<?if(!empty($item['DISPLAY_PROPERTIES']['TEXT_BTN']['VALUE'])):?>
                    <div class="owl-carousel__up-slider__content_bottom">
						<div class="owl-carousel__slider-item-button">
							<a href="<?=$url_page?>" class="owl-carousel__slider-item-button__text"><?=$item['DISPLAY_PROPERTIES']['TEXT_BTN']['VALUE']?></a>
						</div>
					</div>
                    <?endif;?>
				</div>
			</div>
			<? endforeach; ?>			
		</div>
	</div>
	<div class="img-wrapper">
		<img src="<?=CFile::GetPath($iblock["PICTURE"]);?>" alt="">
	</div>
</div>
