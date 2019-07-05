<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>
<!-- <pre> 
	<? //print_r($arResult) ?> 
</pre> -->


<!-- product block -->
<div class="product-block">
	<div class=" product-block__product-slider">
		<div class="slider-nav-block">
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" width='93'>
				<?if (count($arResult["MORE_PHOTO"]) > 0):?>
                    <? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
						<?$renderImage = CFile::ResizeImageGet($PHOTO, Array("width" => 93, "height" => 93), BX_RESIZE_IMAGE_EXACT, false);?>
						<img  src="<?= $renderImage["src"] ?>"
								alt="<?= $arResult["NAME"] ?>"/>
					<? endforeach; ?>
				<?endif;?>
		</div>
		<div class="slider-product-view">
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" width='93'>
			<?if (count($arResult["MORE_PHOTO"]) > 0):?>
				<? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
					<?$renderImage = CFile::ResizeImageGet($PHOTO, Array("width" => 93, "height" => 93), BX_RESIZE_IMAGE_EXACT, false);?>
					<img  src="<?= $renderImage["src"] ?>"
							alt="<?= $arResult["NAME"] ?>"/>
				<? endforeach; ?>
			<?endif;?>
		</div>
	</div>

	<div class="product-block__description">
		<div class="desc-block">
			<div class="product-block__description__title"><?=$arResult["NAME"]?></div>
			<div class="product-block__description__desc"><?= $arResult['DETAIL_TEXT'] ?></div>
			<div class="product-block__description-item-more">
				<a href="<?= $arResult['PROPERTIES']['YOUTUBE_LINK']['VALUE'] ?>">
					<span class="product-block__description-more__text">
						<img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb-color.svg" alt="">Смотреть видео тренировок
					</span>
				</a>
			</div>
		</div>

		<div class="button-block">
			<div class="product-block__description__prices">
				<span class="price">1690 Р</span>
				<span class="old-price">2380 Р</span>
			</div>
			<div class="product-block__description__buttons">
				<a href="#"><div class="product-block__description__buy-in-click"><span class="product-block__description__buy-in-click__text">купить в 1 клик</span></div></a>
				<a href="#"><div class="product-block__description__add-to-cart"><span class="product-block__description__add-to-cart__text">добавить в корзину</span></div></a>
			</div>
			<p class="product-block__description__credit_link"><a class="how-start-block__help-link" href="#">Купить в рассрочку</a></p>
		</div>
	</div>
	<script>
		$('.slider-nav-block').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			focusOnSelect: true,
			asNavFor: '.slider-product-view'
		});

		$('.slider-product-view').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			arrows: false
		});
	</script>
</div>
<!-- end of product block -->



<!-- Свойства -->
	<?if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])):?>
	<!-- Если есть преддожения -->
		<?foreach($arResult["OFFERS"] as $arOffer):?>
			<!-- Свойства -->
			<?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
				
			<?endforeach?>
			<!-- Цены -->
			<?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
				<?if($arPrice["CAN_ACCESS"]):?>
					<?=$arResult["CAT_PRICES"][$code]["TITLE"];?>
					<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
						<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
					<?else:?>
						<?=$arPrice["PRINT_VALUE"]?>
					<?endif?>
					</p>
				<?endif;?>
			<?endforeach;?>
			<!-- Покупка -->
			<?if($arOffer["CAN_BUY"]):?>
					<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" сlass="add_form">
						<a href="javascript:void(0)" onclick="if (BX('QUANTITY<?= $arOffer['ID'] ?>').value &gt; 1) BX('QUANTITY<?= $arOffer['ID'] ?>').value--;">-</a>
	                        <input type="text" name="QUANTITY" value="1" id="QUANTITY<?= $arOffer['ID'] ?>"/>
	                    <a href="javascript:void(0)" onclick="BX('QUANTITY<?= $arOffer['ID'] ?>').value++;">+</a>
						<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" size="5">
						<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
						<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arOffer["ID"]?>">
						<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
						<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CT_BCE_CATALOG_ADD")?>">
					</form>
			<?elseif(count($arResult["CAT_PRICES"]) > 0):?>
				<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
			<?endif?>
		<?endforeach;?>
	<?else:?>
	<!-- Если нет преддожений -->

		<!-- Цены -->
		<?foreach($arResult["PRICES"] as $code=>$arPrice):?>
			<?if($arPrice["CAN_ACCESS"]):?>
				<?=$arResult["CAT_PRICES"][$code]["TITLE"];?>
				<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
					<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
				<?else:?>
					<?=$arPrice["PRINT_VALUE"]?>
				<?endif?>
				</p>
			<?endif;?>
		<?endforeach;?>
		<!-- Покупка -->
		<?if($arResult["CAN_BUY"]):?>
				<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" сlass="add_form">
				<a href="javascript:void(0)" onclick="if (BX('QUANTITY<?= $arElement['ID'] ?>').value &gt; 1) BX('QUANTITY<?= $arElement['ID'] ?>').value--;">-</a>
                        <input type="text" name="QUANTITY" value="1" id="QUANTITY<?= $arElement['ID'] ?>"/>
                    <a href="javascript:void(0)" onclick="BX('QUANTITY<?= $arElement['ID'] ?>').value++;">+</a>
				<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
				<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
				<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
				<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CATALOG_ADD_TO_BASKET")?>">
				</form>
		<?elseif((count($arResult["PRICES"]) > 0) || is_array($arResult["PRICE_MATRIX"])):?>
			<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
		<?endif?>
	<?endif?>
		
	
	<!-- Описание -->
	<?=$arResult["DETAIL_TEXT"]?>



