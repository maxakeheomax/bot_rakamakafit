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
				<div class="exercises-list-block__item-title">
					<a href="/trainings/<?=$section['IBLOCK_CODE']?>/<?= $section['CODE']?>/">
						<span> <?= $section['NAME']?> </span>
					</a>
				</div>
				<? $elements = CIBlockElement::GetList([],
					["IBLOCK_SECTION_ID"=>$section['ID']]
				);?>
				<ul class="exercises-list-block__exercises-list">
					<? while ($element = $elements->Fetch()):?>
						<li><a href="/trainings/<?=$section['IBLOCK_CODE']?>/<?= $section['CODE'].'/'.$element['CODE'] ?>/"><span> <?= $element['NAME'] ?> </span></a></li>
					<? endwhile; ?>
				</ul>
			</div>
			<? endforeach; ?>
		</div>
	</div>



<!-- CEO-text-block -->
<div class="ceo-text-block">
	<div class="ceo-text-block__content">
		<?= CIBlock::GetList(array(), ['CODE' => 'exercises'] )->Fetch()['DESCRIPTION'] ?>
	</div>
</div>

<? CMain::IncludeFile(SITE_DIR.'include/subscribe_form_blue.php') ?> 