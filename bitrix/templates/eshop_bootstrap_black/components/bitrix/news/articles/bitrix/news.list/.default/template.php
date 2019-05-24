<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<!-- HEADER START -->

<div class="up-hello-block">
	<div class="up-hello-block__left-side">
		<div class="up-hello-block__left-side__decor-item"></div>
	<div class="up-hello-block__left-side__title-block">
		<div class="up-hello-block__left-side__title">Привет! <br>
		Я - Настя #RAKAMAKAFIT</div>
		<div class="up-hello-block__left-side__desc">Приветствую тебя в своем блоге!</div>
	</div>
	</div>
	<div class="up-hello-block__right-side">
			<div class="up-hello-block__right-side__down-decor-item"></div>
		<div class="up-hello-block__right-side__img"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/up-hello-block.jpg" alt=""></div>
			<div class="up-hello-block__right-side__up-decor-item"></div>
	</div>
</div>

<!-- HEADER END -->


<!-- ARTICLES LIST START -->

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<div class="grey-bg articles special-offer-block">
	<div class="special-offer-block__title">
		<p class="special-offer-block__title__name">статьи</p>
	</div>
	<div class="special-offer-block__items">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			
			<div class="special-offer-block__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">		
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
								class="preview_picture"
								border="0"
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								style="float:left"
								/></a>
					<?else:?>
						<img
							class="preview_picture"
							border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							style="float:left"
							/>
					<?endif;?>
				<?endif?>
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<div class="special-offer-block__item__title">
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
						</div>
					<?else:?>
						<div class="special-offer-block__item__title">
							<?echo $arItem["NAME"]?>
						</div>
					<?endif;?>
				<?endif;?>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="special-offer-block__item__desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
				<?endif;?>
			</div>
		<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
