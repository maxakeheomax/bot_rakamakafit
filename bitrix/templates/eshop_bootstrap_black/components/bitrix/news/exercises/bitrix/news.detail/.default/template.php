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




$arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y");

$dbSection = CIBlockSection::GetList(Array(), $arFilter, false);

$sections = [];
while ($arSection = $dbSection->Fetch()) {
	if(!$arSection["IBLOCK_SECTION_ID"]){
		$sections[$arSection["ID"]] = array(
			"NAME" => "{$arSection["NAME"]}", 
			"CODE" => $arSection["CODE"]
		);
	}else{
		$sections[$arSection["IBLOCK_SECTION_ID"]]['sub'][] = array(
			"NAME" => "{$arSection["NAME"]}", 
			"CODE" => $arSection["CODE"]
		);
	}
}
$current_section = $sections[ $arResult['SECTION']['PATH'][0]['ID'] ];
// var_dump($sections);
?>

	


<!-- main sider -->
<div class="article-slider owl-carousel middle-slider owl-theme">
	<? foreach($arResult['PROPERTIES']['PICTURES']['VALUE'] as $image_id): ?>
		<div class="owl-carousel__slider-item" style="background: url('<?= CFile::GetPath( $image_id )?>');background-size: 100% 100%; ">
		</div>
	<? endforeach;?>
</div>
<!-- end of main sider -->

<div class="white-bg ceo-text-block">
	<div class="ceo-text-block__content">
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<div class="ceo-text-block__title"><?=$arResult["NAME"]?></div>
	<?endif;?>
	
	
	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div class="ceo-text-block__text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
	<?else:?>
		<div class="ceo-text-block__text">
			<?echo $arResult["PREVIEW_TEXT"];?>
		</div>
	<?endif?>
	<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
	</div>
</div>

<div class="exercises-tabs-block">
		<div class="exercises-tabs-block__title"><?= $arResult['SECTION']['PATH'][0]['NAME']?></div>
		<div class="exercises-tabs-block__tabs">
			<? foreach($current_section['sub'] as $sub_section): ?>
			<a href="<?= $current_section['CODE'].'/'.$sub_section['CODE']?>">
				<div class="exercises-tabs-block__tabs__item hands"><p><?= $sub_section['NAME'] ?></p></div>
			</a>	
			<? endforeach; ?>
		</ul>
	</div>
</div>

<div class="personal-programm promo-train-block__slider-item" >
	<div class="promo-train-block__slider-item__slider-content">
		<p class="promo-train-block__slider-item__slider-content__slogan">Мы подберем для тебя <span class="promo-train-block__title_underline-block-up"> программу тренировок</span> на все группы мышц </p>
		<div class="promo-train-block__slider__content_bottom">
			<div class="promo-train-block__slider-item-button">
				<span class="promo-train-block__slider-item-button__text">Купить</span>
			</div>
		</div>
	</div>
</div>