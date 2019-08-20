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
<? //var_dump($APPLICATION->GetCurUri()); ?>
<?
if(!preg_match('|\/trainings\/exercises\/\w+|', $APPLICATION->GetCurUri()) ):
	$arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y");
	$dbSection = CIBlockSection::GetList(Array(), $arFilter, false);

	$sections = [];
	while ($arSection = $dbSection->Fetch()) {
		if(!$arSection["IBLOCK_SECTION_ID"]){
			$sections[$arSection["ID"]] = $arSection;
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
				<? $elements = CIBlockElement::GetList([],
					["IBLOCK_SECTION_ID"=>$section['ID']]
				);?>
				<ul class="exercises-list-block__exercises-list">
					<? while ($element = $elements->Fetch()):?>
						<li><a href="/trainings/<?=$section['IBLOCK_CODE']?>/<?= $section['CODE'].'#'.$element['CODE'] ?>"><span> <?= $element['NAME'] ?> </span></a></li>
					<? endwhile; ?>
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
				<a href="/trainings/programm/">	<div class="personal-offer-block__left-side__button">
					<span class="personal-offer-block__left-side__button__text">Купить</span>
				</div></a>
			</div>
			<div class="personal-offer-block__right-side" style="background:url(<?=CFile::GetPath($arResult['section']['PICTURE']);?>)">
				<div class="personal-offer-block__right-side__slogan"><?= $arResult['section']['DESCRIPTION']?></div>
				<? $prod = CIBlockElement::GetByID($arResult['section']['UF_PRODUCT'])->GetNext();?>
				<a href="<?=$prod['DETAIL_PAGE_URL']?>"><div class="personal-offer-block__right-side__button">
					<span class="personal-offer-block__right-side__button__text">подробнее</span>
				</div></a>
			</div>
		</div>
	</div>


	<div class="exercise-demos-list-blocks">
	<? foreach($arResult['elements'] as $exercise): ?>
	<? //echo '<pre>'; var_dump($exercise); echo '</pre>'; ?>
	
		<?
			$this->AddEditAction($exercise['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($exercise['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="exercise-demos-list-block" id="<?=$exercise['CODE']?>">
			<div class="exercise-demos-list-block__left-side">
				<div class="exercise-demos-list-block__left-side__img-block">
					<img src="<?=CFile::GetPath($exercise["PREVIEW_PICTURE"])?>" alt="">
				</div>	
			</div>
			<div class="exercise-demos-list-block__right-side">
				<div class="exercise-demos-list-block__right-side__title"><?echo $exercise["NAME"]?></div>
				<div class="exercise-demos-list-block__right-side__desc"><?echo $exercise["PREVIEW_TEXT"];?></div>
				<!-- <a href="#"><div class="exercise-demos-list-block__right-side__button">
					<span class="exercise-demos-list-block__right-side__button__text">смотреть</span>
				</div></a> -->
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
