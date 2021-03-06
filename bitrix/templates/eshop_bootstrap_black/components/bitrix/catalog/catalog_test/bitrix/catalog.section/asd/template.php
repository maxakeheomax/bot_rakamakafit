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


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_SpecialOffer",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"special_offer_bundle",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"FIELD_CODE" => array("ID", "CODE", "XML_ID", "NAME", "TAGS", "SORT", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_FROM", "ACTIVE_FROM", "DATE_ACTIVE_TO", "ACTIVE_TO", "SHOW_COUNTER", "SHOW_COUNTER_START", "IBLOCK_TYPE_ID", "IBLOCK_ID", "IBLOCK_CODE", "IBLOCK_NAME", "IBLOCK_EXTERNAL_ID", "DATE_CREATE", "CREATED_BY", "CREATED_USER_NAME", "TIMESTAMP_X", "MODIFIED_BY", "USER_NAME", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
		"PROPERTY_CODE" => array("PRICE", ""),
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
<!-- exercises-promo-block -->
<div class="container-fluid exercises-promo-block">
	<div class="row xercises-promo-block_row">
		<div class="col-md-6 exercises-promo-block__left-side">
			<div class="exercises-promo-block__left-side__title">Упражнения с фитнес лентами</div>
			<div class="exercises-promo-block__left-side__desc">Мы собрали для тебя примеры самых убойных
				упражений с фитнес лентами на любую группу мышц</div>
			<a href="#">
				<div class="exercises-promo-block__left-side__button">
					<span class="exercises-promo-block__left-side__button__text">примеры упражнений</span>
				</div>
			</a>
		</div>
		<div class="col-md-6 exercises-promo-block__right-side">
			<div class="img-block">
				<a href="#"> <img class="img-block__eye-button" src="assets/eye-button.svg" alt=""></a>
				<img class="img-block__exercise-pic" src="assets/exercises-promo.jpg" alt="">
				<div class="exercises-promo-block__right-side__tabs">
					<ul>
						<a href="#">
							<li>спина</li>
						</a>
						<a href="#">
							<li>ягодицы</li>
						</a>
						<a href="#">
							<li>руки</li>
						</a>
						<a href="#">
							<li>плечи</li>
						</a>
						<a href="#">
							<li>ноги</li>
						</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>