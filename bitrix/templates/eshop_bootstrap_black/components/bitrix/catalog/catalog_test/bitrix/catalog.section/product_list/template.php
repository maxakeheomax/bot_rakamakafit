<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);



// echo $_GET['my_range'];
// die;
?>




<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="catalog_block">
	<div class="catalog__block__tabs">
		<div class="catalog__block__tabs__title">Сортировать</div>
		<a href="<?= $APPLICATION->GetCurPageParam("sort=popular",array("sort"), false) ?>">по полуярности</a>
		<a href="<?= $APPLICATION->GetCurPageParam("sort=price",array("sort"), false) ?>">по цене</a>
		<a href="<?= $APPLICATION->GetCurPageParam("sort=available",array("sort"), false) ?>">по наличию</a>
	</div>



	<div class="pop-products-block__items">
		<? //echo '<pre>' . var_export( CPrice::GetBasePrice($arResult["ITEMS"][0]['ID']), true) . '</pre>'; ?>
		<?foreach($arResult["ITEMS"] as $key => $arElement):?>

		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="pop-products-block__item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">		
			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>">
				<div class="pop-products-block__item__img-block">
					<? if($arElement["PREVIEW_PICTURE"]["SRC"]){
						$image = $arElement["PREVIEW_PICTURE"]["SRC"];
					}else{
						$image = $arElement["DETAIL_PICTURE"]["SRC"];
					}?>
					<img src="<?=$image?>" alt="<?=$arElement["NAME"]?>">
				</div>
			</a>
			<div class="pop-products-block__item__title"><span class="title-span"><?=$arElement["NAME"]?></span></div>
			<div class="pop-products-block__item__prices">
				<div class="pop-products-block__item__price"><?= CPrice::GetBasePrice($arElement['ID'])['PRICE']?></div>
				<div class="pop-products-block__item__old-price"><?=$arElement["DISCOUNT"]?></div>
				<a href="#"><div class="pop-products-block__item-cart"></div></a>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<? //$arResult["NAV_STRING"]?>
<?endif;?>
