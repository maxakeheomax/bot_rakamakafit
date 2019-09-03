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
	<? foreach($arResult['ITEMS'] as $exercise): ?>
	<? //echo '<pre>'; var_dump($exercise); echo '</pre>'; ?>
	
		<?
			$this->AddEditAction($exercise['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($exercise['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($exercise["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="exercise-demos-list-block" id="<?=$exercise['CODE']?>">
			<div class="exercise-demos-list-block__left-side">
				<div class="exercise-demos-list-block__left-side__img-block">
					<img src="<?=$exercise["PREVIEW_PICTURE"]['SRC']?>" alt="">
				</div>	
			</div>
			<div class="exercise-demos-list-block__right-side">
				<div class="exercise-demos-list-block__right-side__title"><?echo $exercise["NAME"]?></div>
				<div class="exercise-demos-list-block__right-side__desc"><?echo $exercise["PREVIEW_TEXT"];?></div>
				<a href="<?=$exercise['DETAIL_PAGE_URL']?>"><div class="exercise-demos-list-block__right-side__button">
					<span class="exercise-demos-list-block__right-side__button__text">смотреть</span>
				</div></a>
			</div>
		</div>
	<? endforeach;?>
	</div>



<!-- CEO-text-block -->
<div class="ceo-text-block">
	<div class="ceo-text-block__content">
		<?= CIBlock::GetList(array(), ['CODE' => 'exercises'] )->Fetch()['DESCRIPTION'] ?>
	</div>
</div>
<? CMain::IncludeFile(SITE_DIR.'include/subscribe_form_blue.php') ?> 