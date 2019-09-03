<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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




// $arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y");

// $dbSection = CIBlockSection::GetList(Array(), $arFilter, false);

// $sections = [];
// while ($arSection = $dbSection->Fetch()) {
// 	if(!$arSection["IBLOCK_SECTION_ID"]){
// 		$sections[$arSection["ID"]] = array(
// 			"NAME" => "{$arSection["NAME"]}", 
// 			"CODE" => $arSection["CODE"]
// 		);
// 	}else{
// 		$sections[$arSection["IBLOCK_SECTION_ID"]]['sub'][] = array(
// 			"NAME" => "{$arSection["NAME"]}", 
// 			"CODE" => $arSection["CODE"]
// 		);
// 	}
// }
// $current_section = $sections[ $arResult['SECTION']['PATH'][0]['ID'] ];
// echo '<pre>';
// var_dump($arResult['SECTION']['PATH'][0]['CODE']);
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
); ?>


<!-- main sider -->
<div class="owl-carousel middle-slider owl-theme personal-offer-block">
	<? foreach ($arResult['PROPERTIES']['FILES']['VALUE'] as $image_id) : ?>
		<div class="owl-carousel__slider-item" style="background: url('<?= CFile::GetPath($image_id) ?>');background-size: 100% 100%; ">
		</div>
	<? endforeach; ?>
</div>
<!-- CEO-text-block -->
<div class="white-bg ceo-text-block">
	<div class="ceo-text-block__content">
		<div class="ceo-text-block__title"><?=$arResult['SECTION']['PATH'][0]['NAME']?></div>
		<div class="ceo-text-block__text">
			<?=$arResult['DETAIL_TEXT']?>
		</div>
	</div>
</div>
<!-- exercises-tabs-block -->
<!-- <div class="exercises-tabs-block">
	<div class="exercises-tabs-block__title"><?=$arResult['SECTION']['PATH'][0]['NAME']?></div>
	<div class="exercises-tabs-block__tabs">
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/hands.jpg') no-repeat;background-size: cover;">
				<p>Для рук</p>
			</div>
		</a>
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/press.jpg') no-repeat;background-size: cover; ">
				<p>Для пресса</p>
			</div>
		</a>
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/butts.jpg') no-repeat;background-size: cover;">
				<p>Для ягодиц</p>
			</div>
		</a>
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/feet.jpg') no-repeat;background-size: cover; ">
				<p>Для ног</p>
			</div>
		</a>
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/backbone.jpg') no-repeat;background-size: cover; ">
				<p>Для спины</p>
			</div>
		</a>
		<a href="#">
			<div class="exercises-tabs-block__tabs__item" style="background: url('assets/chest.jpg') no-repeat;background-size: cover; ">
				<p>На грудь</p>
			</div>
		</a>
		</ul>
	</div>
</div> -->
<!-- personal offer block -->
<div class="personal-offer-block">
	<div class="personal-offer-block__row">
		<div class="personal-offer-block__left-side">
			<div class="personal-offer-block__left-side__slogan">Мы подберем для тебя программу тренировок на все группы мышц</div>
			<a href="#">
				<div class="personal-offer-block__left-side__button">
					<span class="personal-offer-block__left-side__button__text">Купить</span>
				</div>
			</a>
		</div>
		<?
		$arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y", "CODE"  => $arResult['SECTION']['PATH'][0]['CODE']);
		$dbSection = CIBlockSection::GetList(Array(), $arFilter, false, ['*', "UF_*"])->Fetch();?>
		<div class="personal-offer-block__right-side" style="background:url(<?=CFile::GetPath($dbSection['PICTURE']);?>)">
			<div class="personal-offer-block__right-side__slogan"><?= $dbSection['DESCRIPTION']?></div>
			<? $prod = CIBlockElement::GetByID($dbSection['UF_PRODUCT'])->GetNext();?>
			<a href="<?=$prod['DETAIL_PAGE_URL']?>"><div class="personal-offer-block__right-side__button">
				<span class="personal-offer-block__right-side__button__text">подробнее</span>
			</div></a>
		</div>
	</div>
</div>

