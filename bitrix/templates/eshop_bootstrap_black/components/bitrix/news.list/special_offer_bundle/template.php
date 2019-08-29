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
//print_r($arResult);
?>



<!-- special offer -->
<div class="container-fluid special-offer-block__items">
	<!-- <div class="special-offer-block__items__row"> -->
		<? foreach($items as $item): ?>
			<div class="special-offer-block__item">
				<?
				$this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
				?>
				<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
					<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="">
				</a>
				<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
					<div class="special-offer-block__item__title"><?= $item['NAME'] ?></div>
				</a>
				<!-- <div class="special-offer-block__item__desc"><?= $item['PREVIEW_TEXT'] ?></div> -->
				<div class="special-offer-block__item__prices">
					<div class="special-offer-block__item__price"><?= CPrice::GetBasePrice($item['ID'])['PRICE']?></div>
					<div class="special-offer-block__item__old-price"><?=$item["DISCOUNT"]?></div>
					<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
						<div class="special-offer--block__item-cart"><span
								class="special-offer--block__item-cart-button__text">купить</span></div>
					</a>
				</div>
			</div>
		<? endforeach; ?>
	<!-- </div> -->
</div>