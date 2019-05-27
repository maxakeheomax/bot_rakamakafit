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
<? //var_dump($arResult); ?>
<?
if(!preg_match('|\/trainings\/exercises\/\w+|', $APPLICATION->GetCurUri()) ):
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
?>

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

	<!-- exercises-list-block -->
	<div class="container exercises-list-block">
		<div class="row exercises-list-block__row">
			<? foreach ($sections as $section):?>
			<div class="col-md-6 exercises-list-block__item">
				<div class="exercises-list-block__item-title"><span> <?= $section['NAME']?> </span></div>
				<ul class="exercises-list-block__exercises-list">
					<? foreach ($section['sub'] as $sub_section):?>
						<li><a href="<?= $section['CODE'].'/'.$sub_section['CODE'] ?>"><span> <?= $sub_section['NAME'] ?> </span></a></li>
					<? endforeach; ?>
				</ul>
			</div>
			<? endforeach; ?>
		</div>
	</div>

<? else: ?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"",
		Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
		)
	);?>


	<div class="personal-offer-block">
		<div class="personal-offer-block__row">
			<div class="personal-offer-block__left-side">
				<div class="personal-offer-block__left-side__slogan">Мы подберем для тебя программу тренировок на все группы мышц</div>
				<a href="#">	<div class="personal-offer-block__left-side__button">
					<span class="personal-offer-block__left-side__button__text">Купить</span>
				</div></a>
			</div>
			<div class="personal-offer-block__right-side">
				<div class="personal-offer-block__right-side__slogan">Прочные и широкие фитнес ленты</div>
				<a href="#"><div class="personal-offer-block__right-side__button">
					<span class="personal-offer-block__right-side__button__text">подробнее</span>
				</div></a>
			</div>
		</div>
	</div>


	<div class="exercise-demos-list-block">
	<? foreach($arResult["ITEMS"] as $exercise): ?>
	<? //echo '<pre>'; var_dump($exercise); echo '</pre>'; ?>
		<?
			$this->AddEditAction($exercise['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($exercise['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="exercise-demos-list-block" id="<?=$this->GetEditAreaId($exercise['ID']);?>">
			<div class="exercise-demos-list-block__left-side">
				<div class="exercise-demos-list-block__left-side__img-block">
					<img src="<?= $exercise["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
				</div>	
			</div>
			<div class="exercise-demos-list-block__right-side">
				<div class="exercise-demos-list-block__right-side__title"><?echo $exercise["NAME"]?></div>
				<div class="exercise-demos-list-block__right-side__desc"><?echo $exercise["PREVIEW_TEXT"];?></div>
				<a href="#"><div class="exercise-demos-list-block__right-side__button">
					<span class="exercise-demos-list-block__right-side__button__text"> <a href="<?=$exercise["DETAIL_PAGE_URL"]?>"> смотреть </a></span>
				</div></a>
			</div>
		</div>
	<? endforeach;?>
	</div>
	


<? endif; ?>

<!-- CEO-text-block -->
<div class="ceo-text-block">
	<div class="ceo-text-block__content">
		<?= CIBlock::GetList(array(), ['CODE' => 'exercises'] )->Fetch()['DESCRIPTION'] ?>
	</div>
</div>

<? CMain::IncludeFile(SITE_DIR.'include/subscribe_form_blue.php') ?> 
