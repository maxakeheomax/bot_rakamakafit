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

<?
if($APPLICATION->GetCurPage() == '/trainings/exercises/'):
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

	<div class=" col-md-6 exercises-list-block__item">
		<div class="exercises-list-block__item-title"><span>Упражнения с эспандерами</span></div>
		<ul class="exercises-list-block__exercises-list">
			<li><a href="#"><span>Для женщин </span></a></li>
			<li><a href="#"><span>Для мужчин</span></a></li>
		</ul>
			</div>
			<div class=" col-md-6 exercises-list-block__item">
		<div class="exercises-list-block__item-title"><span>Упражнения с фитболом</span></div>
		<ul class="exercises-list-block__exercises-list">
			<li><a href="#"><span>для рук</span></a></li>
			<li><a href="#"><span>для пресса</span></a></li>
			<li><a href="#"><span>для ягодиц</span></a></li>
			<li><a href="#"><span>Преседание с резинками</span></a></li>
			<li><a href="#"><span>Отведение ноги</span></a></li>
		</ul>
	</div>
</div>
</div>


<? endif; ?>