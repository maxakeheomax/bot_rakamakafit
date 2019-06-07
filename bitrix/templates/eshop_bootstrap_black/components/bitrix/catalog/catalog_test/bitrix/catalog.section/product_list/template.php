<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>




<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>


<div class="tapes promo-train-block__slider-item" >
	<div class="promo-train-block__slider-item__slider-content">
		
	<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		
		<div class="promo-train-block__slider-item__slider-content-tabs">
			<? $index = 0;
			foreach($arResult["ITEMS"] as $cell=>$arElement):?>
				<p class="promo-train-block__slider-item__slider-content__promo-title <?  if($index == 0) echo 'active' ?>"><?=$arElement["NAME"]?></p> 
				<? $index++ ?>
			<? endforeach; ?>
		</div>

		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<p class="promo-train-block__slider-item__slider-content__slogan"><?=$arElement["PROPERTIES"]["SLOGAN"]['VALUE']['TEXT']?></p>
		<p class="promo-train-block__slider-item__slider-content__dicription"><?=$arElement["PREVIEW_TEXT"]?></p>
		<div class="promo-train-block__slider__content_bottom">
			<div class="promo-train-block__slider-item-button">
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"> 
					<span class="promo-train-block__slider-item-button__text">Подробнее</span>
				</a>
			</div>
			<div class="promo-train-block__slider-item-more">
				<a href="#">

					<span class="promo-train-block__slider-item-more__text"><img src="<?=$arElement["PROPERTIES"]["YUOTUBELINK"]['VALUE']?>" alt="">Смотреть видео тренировок</span></a>
				</div>
			</div>
		</div>
		
		
		<? break; 
			/////////////////////// new HTML needed
		?>

		<?endforeach;?>
	</div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
