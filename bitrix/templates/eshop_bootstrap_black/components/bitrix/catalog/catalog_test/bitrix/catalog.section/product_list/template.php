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
		<? if (isset($_GET['order']) && $_GET['order'] == "DESC") {
			$order = "ASC";
		} else {
			$order = "DESC";
		}?>
		<a class="<?=((isset($_GET['sort']) && $_GET['sort'] == 'popular') ? $order : "")?>" href="<?= $APPLICATION->GetCurPageParam("sort=popular&order=".$order,array("sort","order"), false) ?>">по полуярности</a>
		<a class="<?=((isset($_GET['sort']) && $_GET['sort'] == 'price') ? $order : "")?>" href="<?= $APPLICATION->GetCurPageParam("sort=price&order=".$order,array("sort","order"), false) ?>">по цене</a>
		<a class="<?=((isset($_GET['sort']) && $_GET['sort'] == 'available') ? $order : "")?>" href="<?= $APPLICATION->GetCurPageParam("sort=available&order=".$order,array("sort","order"), false) ?>">по наличию</a>
	</div>


	<div class="pop-products-block__items">
		<? //echo '<pre>' . var_export( CPrice::GetBasePrice($arResult["ITEMS"][0]['ID']), true) . '</pre>'; ?>
		<?foreach($arResult["ITEMS"] as $key => $arElement):?>
            <?
                $arTorPreds = CCatalogSKU::getOffersList($arElement['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
                foreach ($arTorPreds as $arTorPred){
                    $url = '/catalog/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
                }
                $url;
            ?>
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
			<div class="pop-products-block__item__title"><span class="title-span"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><?=TruncateText($arElement["NAME"],70)?></a></span></div>
			<div class="pop-products-block__item__prices">
				<div class="pop-products-block__item__price"><?= CPrice::GetBasePrice($arElement['ID'])['PRICE']?></div>
				<div class="pop-products-block__item__old-price"><?=$arElement["DISCOUNT"]?></div>
				<a href="<?=$url?>"><div class="pop-products-block__item-cart"></div></a>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<? //$arResult["NAV_STRING"]?>
<?endif;?>
