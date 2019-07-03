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
// $this->setFrameMode(true);
if($_GET['sort']) $sort = 'popular';
if($_GET['price']) $sort = 'price';
if($_GET['available']) $sort = 'available';
?>

<div class="filters_block">
	<form action="<?= $APPLICATION->GetCurPage(false) ?>" method="GET">
	<input type="hidden" name="sort" value="<?= $_GET['sort'] ?>">
		<div class="filters_block-title">Фильтры по параметрам</div>
			<div class="filters__blok__items">
				<div class="filters_block__filter">
					<div class="filters_block__filter__title">Цена</div>
					<div class="filters_block__filter__item-list inline">
						<input class="valueFrom" type="text" name="" id="">
						<input class="valueTo" type="text" name="" id="">
					</div>
					<input type="text" class="js-range-slider" name="my_range" value="" />
				</div>
				<div class="filters_block__filter width-block">
					<div class="filters_block__filter__title">Материал</div>
					<div class="filters_block__filter__item-list">
						<ul>
							<li><input id="filter_id-1" type="checkbox"><label for="filter_id-1">100% Латекс</label></li>
							<li><input id="filter_id-2" type="checkbox"><label for="filter_id-2">Латекс, полипропилен, неопрен</label></li>
							<li><input id="filter_id-3" type="checkbox"><label for="filter_id-3">Латекс, полипропилен</label></li>
						</ul>
					</div>
				</div>
				<div class="filters_block__filter">
					<div class="filters_block__filter__title">Длина, см (по окружности)</div>
					<div class="filters_block__filter__item-list">
						<ul>
							<li><input id="filter-2_id-1" type="checkbox"><label for="filter-2_id-1">30</label></li>
							<li><input id="filter-2_id-2" type="checkbox"><label for="filter-2_id-2">30 - 60</label></li>
							<li><input id="filter-2_id-3" type="checkbox"><label for="filter-2_id-3">64</label></li>
							<li><input id="filter-2_id-4" type="checkbox"><label for="filter-2_id-4">74</label></li>
							<li><input id="filter-2_id-5" type="checkbox"><label for="filter-2_id-5">84</label></li>
						</ul>
					</div>
				</div>
				<div class="filters_block__filter">
					<div class="filters_block__filter__title">Вес, кг</div>
				
					<div class="filters_block__filter__item-list inline">
						<input type="text" name="" id="" pattern="[0-9]+">
						<input type="text" name="" id="" pattern="[0-9]+">
					</div>
				</div>
			</div>
			<button class="promo-form-block__form__submit" type="submit">показать</button>
			<div class="reset-filters">
				<a href="<?= $APPLICATION->GetCurPage(false) ?>"><span>Сбросить фильтры</span></a>
			</div>
		</form>
	</div>


