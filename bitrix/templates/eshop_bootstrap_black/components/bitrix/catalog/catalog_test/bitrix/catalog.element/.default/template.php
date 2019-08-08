<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>
<pre> 
	<? 
	// var_dump($arResult);
	// print_r(CCatalogDiscount::GetByID(2)) ?> 
</pre>


<!-- product block -->
<div class="product-block">
	<div class=" product-block__product-slider">
		<div class="slider-nav-block">			
				<?if (count($arResult["MORE_PHOTO"]) > 0):?>
                    <? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
						<?$renderImage = CFile::ResizeImageGet($PHOTO, Array("width" => 93, "height" => 93), BX_RESIZE_IMAGE_EXACT, false);?>
						<img  src="<?= $renderImage["src"] ?>" alt="<?= $arResult["NAME"] ?>"/>
					<? endforeach; ?>
				<?endif;?>
		</div>
		<div class="slider-product-view">			
			<?if (count($arResult["MORE_PHOTO"]) > 0):?>
				<? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
					<?$renderImage = CFile::ResizeImageGet($PHOTO, Array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_EXACT, false);?>
					<img  src="<?= $renderImage["src"] ?>" alt="<?= $arResult["NAME"] ?>"/>
				<? endforeach; ?>
			<?endif;?>
		</div>
	</div>
	<div class="product-block__description">
		<div class="desc-block">
			<div class="product-block__description__title"><?=$arResult["NAME"]?></div>
			<div class="product-block__description__desc"><?= $arResult['DETAIL_TEXT'] ?></div>
			<div class="product-block__description-item-more">
				<? if ($arResult['PROPERTIES']['YOUTUBE_LINK']['VALUE'] ) : ?>
				<a href="<?= $arResult['PROPERTIES']['YOUTUBE_LINK']['VALUE'] ?>">
					<span class="product-block__description-more__text">
						<img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb-color.svg" alt="">Смотреть видео тренировок
					</span>
				</a>
				<? endif ?>
			</div>
		

		<div class="button-block">

		<!-- Свойства -->
		<?if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])):?>
		<!-- Если есть преддожения -->
			<?foreach($arResult["OFFERS"] as $arOffer):?>
				<!-- Свойства -->
				<?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					
				<?endforeach?>
				<!-- Цены -->
				<?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
					<div class="product-block__description__prices">
						<?if($arPrice["CAN_ACCESS"]):?>
							<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
								<span class="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span> 
								<span class="old-price"><?= $arPrice["PRINT_VALUE"] ?></span>
							<?else:?>
								<span class="price"><?=$arPrice["PRINT_VALUE"]?></span>
							<?endif?>					
						<?endif;?>
					</div>
				<?endforeach;?>
				<!-- Покупка -->
				<?if($arOffer["CAN_BUY"]):?>
						<form name="add_form" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" сlass="add_form">
							<a href="javascript:void(0)" onclick="if (BX('QUANTITY<?= $arOffer['ID'] ?>').value &gt; 1) BX('QUANTITY<?= $arOffer['ID'] ?>').value--;"></a>
							<input type="hidden" name="QUANTITY" value="1" id="QUANTITY<?= $arOffer['ID'] ?>"/>
							<a href="javascript:void(0)" onclick="BX('QUANTITY<?= $arOffer['ID'] ?>').value++;"></a>
							<input type="hidden" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" size="5">
							<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
							<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arOffer["ID"]?>">
							<input style="display:none" type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>">
							<input style="display:none" type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>">
							<div class="product-block__description__buttons">
							<a id="BUY" href="#" onclick=""><div class="product-block__description__buy-in-click"><span class="product-block__description__buy-in-click__text">купить в 1 клик</span></div></a>
							<a id="ADD2BASKET" href="#" onclick=""><div class="product-block__description__add-to-cart"><span class="product-block__description__add-to-cart__text">добавить в корзину</span></div></a>						
						</form>
				<?elseif(count($arResult["CAT_PRICES"]) > 0):?>
					<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
				<?endif?>
				<? break; ?>
			<?endforeach;?>

			<script>
				$(document).ready(function(){
					$('#BUY').click(function(){
						$('input[name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>"]').click();
					});
					$('#ADD2BASKET').click(function(){
						$('input[name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>"]').click();
					});
				});
			</script>
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
					<form name="add_form" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" сlass="add_form">
					<a href="javascript:void(0)" onclick="if (BX('QUANTITY<?= $arElement['ID'] ?>').value &gt; 1) BX('QUANTITY<?= $arElement['ID'] ?>').value--;"></a>
							<input type="text" name="QUANTITY" value="1" id="QUANTITY<?= $arElement['ID'] ?>"/>
						<a href="javascript:void(0)" onclick="BX('QUANTITY<?= $arElement['ID'] ?>').value++;"></a>
					<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
					<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CATALOG_ADD_TO_BASKET")?>">
					<a id="BUY" href="" onclick=""><div class="product-block__description__buy-in-click"><span class="product-block__description__buy-in-click__text">купить в 1 клик</span></div></a>
					<a id="ADD2BASKET" href="" onclick=""><div class="product-block__description__add-to-cart"><span class="product-block__description__add-to-cart__text">добавить в корзину</span></div></a>						
					</form>
			<?elseif((count($arResult["PRICES"]) > 0) || is_array($arResult["PRICE_MATRIX"])):?>
				<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
			<?endif?>
		<?endif?>

		</div>
			<p class="product-block__description__credit_link"><a class="how-start-block__help-link" href="#">Купить в рассрочку</a></p>
		</div>
	</div>
</div>
</div>


<!-- end of product block -->

<!-- Product description block -->
<div class="product-description-block">
	<div class="product-description-block__title">Описание и характеристики</div>
	<div class="product-description-block__decription"><?=$arResult["PREVIEW_TEXT"]?></div>
</div>
<!-- end of Product description block -->

<div class="advantages-block mini">
	<div class="advantages-block__item">
		<div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/cloud.svg" alt=""></div>
		<div class="advantages-block_disc">Тренируйся<br> где угодно</div>

	</div>
	<div class="advantages-block__item">
		<div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/fire.svg" alt=""></div>
		<div class="advantages-block_disc">Самые горячие упражнения</div>
	</div>
	<div class="advantages-block__item">
		<div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/diamond.svg" alt=""></div>
		<div class="advantages-block_disc">Гарантия 90 дней <br>и простой возврат</div>
	</div>
	<div class="advantages-block__item">
		<div class="advantages-block__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/heart.svg" alt=""></div>
		<div class="advantages-block_disc">Безопасный двусторонний латекс</div>
	</div>
</div>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_SpecialOffer",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "banner",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<!-- special offer -->
<div class=" training special-offer-block__title">
	<p class="special-offer-block__title__name">Вместе дешевле</p>
</div>
<div class="training-slider special-offer owl-carousel middle-slider owl-theme">
	<div class="owl-carousel__slider-item">
		<div class="special-offer-block">
			<div class="special-offer-block__items">
				<div class="special-offer-block__item">
					<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
						<div class="special-offer-block__item__title"><p>Персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
					</a>
					<div class="special-offer-block__item__prices">
						<div class="special-offer-block__item__price">5980 ₽</div>
						<div class="special-offer-block__item__old-price">7980 ₽</div>
						<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
					</div>
				</div>
				<div class="special-offer-block__item">
					<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
						<div class="special-offer-block__item__title"><p>Набор эспандеров + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div></a>
						<div class="special-offer-block__item__prices">
							<div class="special-offer-block__item__price">7980 ₽</div>
							<div class="special-offer-block__item__old-price"></div>
							<a href="#"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
						</div>
					
					</div>
					<div class="special-offer-block__item">
						<a href="#">	<img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
							<div class="special-offer-block__item__title"><p>Набор эспандеры + ленты + гриф + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
						</a>
						<div class="special-offer-block__item__prices">
							<div class="special-offer-block__item__price">5980 ₽</div>
							<div class="special-offer-block__item__old-price"></div>
							<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="owl-carousel__slider-item">
			<div class="special-offer-block">
				<div class="special-offer-block__items">
					<div class="special-offer-block__item">
						<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
							<div class="special-offer-block__item__title"><p>Персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
						</a>
						<div class="special-offer-block__item__prices">
							<div class="special-offer-block__item__price">5980 ₽</div>
							<div class="special-offer-block__item__old-price">7980 ₽</div>
							<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
						</div>
					</div>
					<div class="special-offer-block__item">
						<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
							<div class="special-offer-block__item__title"><p>Набор эспандеров + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div></a>
							<div class="special-offer-block__item__prices">
								<div class="special-offer-block__item__price">7980 ₽</div>
								<div class="special-offer-block__item__old-price"></div>
								<a href="#"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
							</div>
						
						</div>
						<div class="special-offer-block__item">
							<a href="#">	<img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
								<div class="special-offer-block__item__title"><p>Набор эспандеры + ленты + гриф + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
							</a>
							<div class="special-offer-block__item__prices">
								<div class="special-offer-block__item__price">5980 ₽</div>
								<div class="special-offer-block__item__old-price"></div>
								<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-carousel__slider-item">
				<div class="special-offer-block">
					<div class="special-offer-block__items">
						<div class="special-offer-block__item">
							<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-1.jpg" alt="">
								<div class="special-offer-block__item__title"><p>Персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
							</a>
							<div class="special-offer-block__item__prices">
								<div class="special-offer-block__item__price">5980 ₽</div>
								<div class="special-offer-block__item__old-price">7980 ₽</div>
								<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
							</div>
						</div>
						<div class="special-offer-block__item">
							<a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-2.jpg" alt="">
								<div class="special-offer-block__item__title"><p>Набор эспандеров + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div></a>
								<div class="special-offer-block__item__prices">
									<div class="special-offer-block__item__price">7980 ₽</div>
									<div class="special-offer-block__item__old-price"></div>
									<a href="#"><div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
								</div>
								
							</div>
							<div class="special-offer-block__item">
								<a href="#">	<img src="<?= SITE_TEMPLATE_PATH ?>/assets/offer-3.jpg" alt="">
									<div class="special-offer-block__item__title"><p>Набор эспандеры + ленты + гриф + персональная 5-недельная программа тренировок и питания RAKAMAKAFIT ONLINE</p></div>
								</a>
								<div class="special-offer-block__item__prices">
									<div class="special-offer-block__item__price">5980 ₽</div>
									<div class="special-offer-block__item__old-price"></div>
									<a href="#">	<div class="special-offer--block__item-cart"><span class="special-offer--block__item-cart-button__text">в корзину</span></div></a>
								</div>
							</div>
						</div>
					</div>
				</div>
</div>

<!-- main sider -->
<div class="feedback difference-block__title">Отзывы</div>
<div class="feedback owl-carousel middle-slider owl-theme">
	<div class="owl-carousel__slider-item" >
		<img src="<?= SITE_TEMPLATE_PATH ?>/assets/feedback.jpg" alt="">
	</div>
	<div class="owl-carousel__slider-item ">
		<img src="<?= SITE_TEMPLATE_PATH ?>/assets/feedback.jpg" alt="">
	</div>
	<div class="owl-carousel__slider-item"  >
		<img src="<?= SITE_TEMPLATE_PATH ?>/assets/feedback.jpg" alt="">
	</div>
	<div class="owl-carousel__slider-item"  >
		<img src="<?= SITE_TEMPLATE_PATH ?>/assets/feedback.jpg" alt="">
	</div>
</div>
<!-- difference-block -->
<div class="difference-block">
	<div class="difference-block__title">Отличие от конкурентов</div>
	<div class="difference-block__content">
		<div class="difference-block__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/difference-1.jpg" alt=""></div>
		<div class="difference-block__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/difference-2.jpg" alt=""></div>
		<div class="difference-block__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/difference-3.jpg" alt=""></div>
	</div>
</div>


<?
if($arResult['ORIGINAL_PARAMETERS']['SECTION_CODE'])
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"CatalogTrainingsSection",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "13",
		"IBLOCK_TYPE" => "trainings",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => $arResult['ORIGINAL_PARAMETERS']['SECTION_CODE'],
		"SECTION_CODE" => $arResult['ORIGINAL_PARAMETERS']['SECTION_CODE'],
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>



<? CMain::IncludeFile('/include/delivery.php'); ?>



<? CMain::IncludeFile('/include/subscribe_form_blue.php'); ?>


<script>
	$('.special-offer.owl-carousel.middle-slider').owlCarousel({
		items:1,
		lazyLoad:true,
		loop:true,
		smartSpeed: 800,
		margin:10,
		dots: false,
		nav:true,
		navText: [`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
	});
	$('.feedback.owl-carousel.middle-slider').owlCarousel({
		items:1,
		lazyLoad:true,
		loop:true,
		smartSpeed: 800,
		margin:10,
		dots: false,
		nav:true,
		center:true,
		navText: [`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
	});
	$('.mixit.owl-carousel.middle-slider').owlCarousel({
		items:1,
		lazyLoad:true,
		loop:true,
		smartSpeed: 800,
		margin:10,
		dots: true,
		nav:true,
		navText: [`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,`<img src"=<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`]
	});
		function toggleTabs(clickBlock, toggleBlock) {
				$(clickBlock).click(function(e){
					let a
					let b = $(this).attr('id');
					e.preventDefault();

					$(clickBlock).removeClass('active');
					$(this).addClass('active');

					$(toggleBlock).each(function(){
						a = $(this).attr('id');
						if(b == a) {
							$(toggleBlock).addClass('hidden-block');
							$(this).removeClass('hidden-block');
						}										
					});
				});
			}
	toggleTabs('.exercises-promo-block__right-side__tab', '.img-block_img-link');
</script>