<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

// $APPLICATION->AddHeadScript(__DIR__."/");

$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$items = $arResult['ITEMS'];
// $sections = [];
?>
<pre>
	<?
	$section_query = CIBlockSection::GetList(array("SORT" => "ASC"), ["IBLOCK_ID" => $arResult['ID'], 'IBLOCK_TYPE' => 'trainings', 'ID' => $GLOBALS['arPropFilter']['SECTION_ID']]);
	$section = $section_query->GetNext();
	// var_dump( $arResult['SECTION']['PATH'] );

	?>
</pre>
<!-- exercises-promo-block -->
<div class="exercises-promo-block">
	<div class="exercises-promo-block__up-container"></div>
	<div class=" exercises-promo-block_row">
		<div class="col-md-6 exercises-promo-block__left-side">
			<div class="exercises-promo-block__left-side__title">Упражнения с фитнес лентами</div>
			<div class="exercises-promo-block__left-side__desc">Мы собрали для тебя примеры самых убойных упражений с фитнес лентами на любую группу мышц</div>
			<a href="/trainings/exercises/">
				<div class="exercises-promo-block__left-side__button">
					<span class="exercises-promo-block__left-side__button__text">примеры упражнений</span>
				</div>
			</a>
		</div>
		<div class="col-md-6 exercises-promo-block__right-side">
			<div class="img-block">
				<? foreach ($items as $id => $item) : ?>
					<div class="img-block_img-link hidden-block" id="<?= $item['ID'] ?>">
						<a href="/trainings/exercises/<?=$section['CODE']?><?= $item['CODE'] ?>"> 
							<img class="img-block__eye-button" src="<?= SITE_TEMPLATE_PATH ?>/assets/eye-button.svg" alt="">
						</a>
						<img class="img-block__exercise-pic" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
					</div>
				<? endforeach; ?>
				<div class="exercises-promo-block__right-side__tabs">
					<ul>
						<? foreach ($items as $id => $item) : ?>
							<a class="exercises-promo-block__right-side__tab" id="backbone" href="/trainings/exercises/<?=$section['CODE']?>/<?= $item['CODE'] ?>">
								<li><?= $item['NAME'] ?></li>
							</a>
						<? endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>