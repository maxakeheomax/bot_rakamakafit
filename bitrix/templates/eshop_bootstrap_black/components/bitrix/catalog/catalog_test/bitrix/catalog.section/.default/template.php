<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<? //echo '<pre>'; var_dump( $arResult["ITEMS_SECTION"]); echo '</pre>'; 
?>
<? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
	<?= $arResult["NAV_STRING"] ?>
<? endif; ?>


<div class="tapes promo-train-block__slider-item" style="background: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>) no-repeat; background-size:cover">
	<div class="promo-train-block__slider-item__slider-content">

		<div class="promo-train-block__slider-item__slider-content-tabs">
			<? $index = 0;
			foreach ($arResult["ITEMS"] as $cell => $arElement) : ?>
				<a class="promo-train-block__slider-item__slider-content-tab <? if ($index == 0) echo 'active' ?>" id="<?= $arElement['ID'] ?>" href="#">
					<p class="promo-train-block__slider-item__slider-content__promo-title "><?= $arElement["NAME"] ?></p>
				</a>
				<? $index++ ?>
			<? endforeach; ?>
		</div>
		<? $index = 0;
		foreach ($arResult["ITEMS"] as $cell => $arElement) : ?>
			<div class="promo-train-block__slider-item__slider-content-tab__content <?= $index == 0 ? '' : 'hidden-block' ?>" id="<?= $arElement['ID'] ?>">
				<?
				$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
				?>

                <?
                    // $arTorPreds = CCatalogSKU::getOffersList($arElement['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
                    // foreach ($arTorPreds as $arTorPred){
                        // $url = '/personal/cart/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
                    // }
                ?>
				<p class="promo-train-block__slider-item__slider-content__slogan"><?= $arElement["PROPERTIES"]["SLOGAN"]['VALUE']['TEXT'] ?></p>
				<p class="promo-train-block__slider-item__slider-content__dicription"><?= $arElement["DETAIL_TEXT"] ?></p>
				<div class="promo-train-block__slider__content_bottom">
					<div class="promo-train-block__slider-item-button">
						<a href="/catalog/<?=$arParams["SECTION_CODE"]?>/<?=$arElement["CODE"]?>/" class="promo-train-block__slider-item-button__text">Купить</a>
					</div>
					<? if ($arElement["PROPERTIES"]["YOUTUBE_LINK"]['VALUE']) : ?>
						<div class="promo-train-block__slider-item-more">
							<a target="_blank" href="<?= $arElement["PROPERTIES"]["YOUTUBE_LINK"]['VALUE'] ?>">
								<span class="promo-train-block__slider-item-more__text"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb-color.svg" alt="">Смотреть видео тренировок</span>
							</a>
						</div>
					<? endif ?>
				</div>
			</div>
			<? $index++ ?>
		<? endforeach; ?>

	</div>
</div>

<script>
	$(document).ready(function() {
		function toggleTabs(clickBlock, toggleBlock) {
			$(clickBlock).click(function(e) {
				let a
				let b = $(this).attr('id');
				e.preventDefault();

				$(clickBlock).removeClass('active');
				$(this).addClass('active');

				$(toggleBlock).each(function() {
					a = $(this).attr('id');
					if (b == a) {
						$(toggleBlock).addClass('hidden-block');
						$(this).removeClass('hidden-block');
					}
				});
			});
		}
		toggleTabs('.exercises-promo-block__right-side__tab', '.img-block_img-link');
		toggleTabs('.promo-train-block__slider-item__slider-content-tab', '.promo-train-block__slider-item__slider-content-tab__content');
	});
</script>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<?= $arResult["NAV_STRING"] ?>
<? endif; ?>


<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_SpecialOffer",
	array(
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
		"FIELD_CODE" => array("", ""),
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
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"special_offer_bundle",
	array(
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
		"FIELD_CODE" => array("ID", "CODE", "XML_ID", "NAME", "TAGS", "SORT", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_FROM", "ACTIVE_FROM", "DATE_ACTIVE_TO", "ACTIVE_TO", "SHOW_COUNTER", "SHOW_COUNTER_START", "IBLOCK_TYPE_ID", "IBLOCK_ID", "IBLOCK_CODE", "IBLOCK_NAME", "IBLOCK_EXTERNAL_ID", "DATE_CREATE", "CREATED_BY", "CREATED_USER_NAME", "TIMESTAMP_X", "MODIFIED_BY", "USER_NAME", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "catalog",
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
		"PROPERTY_CODE" => array("PRICE", ""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>


<?
$target_section = CIBlockSection::GetList([], ['IBLOCK_TYPE' => 'trainings', "IBLOCK_ID" => $iblock_id, "CODE" => $arParams["SECTION_CODE"]]);

// echo '<pre>'; var_dump($target_section->Fetch()); echo '</pre>';
$iblock_id = CIBlock::GetList(array(), array("CODE" => "exercises", "TYPE" => "trainings"))->Fetch()['ID'];
if ($target_section->Fetch())
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"catalog_section_exercises",
		array(
			"IBLOCK_TYPE" => "trainings",
			"IBLOCK_ID" => $iblock_id,
			// "SECTION_ID" => $arParams["SECTION_ID"],
			"SECTION_CODE" => $arParams["SECTION_CODE"],
			"DISPLAY_PANEL" => "N",
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
		),
		$component
	);
?>
<!-- exercises-promo-block -->



<? $APPLICATION->IncludeFile(SITE_DIR . 'include/subscribe_form_blue.php') ?>




<?
$iblock_id = CIBlock::GetList(array(), array("CODE" => "instagram", "TYPE" => "banner"))->Fetch()['ID'];
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"BottomSlider",
	array(
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
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => $iblock_id,
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
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>