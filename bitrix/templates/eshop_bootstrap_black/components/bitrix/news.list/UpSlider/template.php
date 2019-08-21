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
<div class="up-block" style="overflow:hidden;">
	<div class="up-slider-wrapper">
		<div class="owl-carousel up-slider owl-theme">
			<? foreach ($items as $item): ?>
                <?
				$arInfo = CCatalogSKU::GetInfoByOfferIBlock(4); 
				$elem = CIBlockElement::GetByID($item['PROPERTIES']['product']['VALUE'])->GetNext();
				$url_page = $elem['DETAIL_PAGE_URL'];
				$rsOffers = CIBlockElement::GetList(array(),array('IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'PROPERTY_'.$arInfo['SKU_PROPERTY_ID'] => $item['PROPERTIES']['product']['VALUE']));
				if ($prod = $rsOffers->GetNext()) {
					$url = '/catalog/?action=ADD2BASKET&amp;id='.$prod['ID'];
				}
                ?>
			<div class="owl-carousel__up-up-slider-item">
				<div class="owl-carousel__up-slider-item__slider-content">
					<p class="owl-carousel__up-slider-item__slider-content__promo-title"><?= $item['NAME']?></p>
					<p class="owl-carousel__up-slider-item__slider-content__slogan"><?= $item['PREVIEW_TEXT']?></p>
					<?if(!empty($item['PROPERTIES']['product']['VALUE'])):?>
                    <div class="owl-carousel__up-slider__content_bottom">
						<div class="owl-carousel__slider-item-button">
							<a href="<?=$url_page?>" class="owl-carousel__slider-item-button__text"><?=$item['PROPERTIES']['BUTTON_TEXT']['VALUE']?></a>
						</div>
					</div>
                    <?endif;?>
				</div>
			</div>
			<? endforeach; ?>			
		</div>
	</div>
	<div class="owl-carousel up-slider-pics owl-theme">
	<? foreach ($items as $item): ?>
		<div class="img-wrapper" style="background: url(<?=$item['PREVIEW_PICTURE']['SRC']?>) no-repeat center; background-size: cover;"></div>
	<?endforeach;?>
	</div>
</div>
