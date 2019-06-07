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
$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$items = $arResult['ITEMS'];

?>



<!-- special offer -->
<div class="bootstrap-box special-offer-block">
	<div class="special-offer-block__title">
		<p class="special-offer-block__title__name">Вместе дешевле</p>
	</div>
	<div class="container-fluid special-offer-block__items">
		<div class="row special-offer-block__items__row">
			<? foreach($items as $item): ?>
				<div class="col-md-4 special-offer-block__item">
                    <?
                    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
                    ?>
					<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="">
					<div class="special-offer-block__item__title"><?= $item['NAME'] ?></div>
					<div class="special-offer-block__item__desc"><?= $item['PREVIEW_TEXT'] ?></div>
					<div class="special-offer-block__item__prices">
						<div class="special-offer-block__item__price"><?= $item['PROPERTIES']['PRICE']['VALUE'] ?> ₽</div>
						<div class="special-offer-block__item__old-price"><?= $item['PROPERTIES']['OLD_PRICE']['VALUE'] ?> ₽</div>
						<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
							<div class="special-offer--block__item-cart"><span
									class="special-offer--block__item-cart-button__text">купить</span></div>
						</a>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</div>