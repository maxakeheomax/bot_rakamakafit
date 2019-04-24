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
<!-- <pre>
	<? 
	// var_dump( GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']) )
	 ?>
</pre> -->
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
