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
<div class="filters_block">
							<div class="filters_block-title">Фильтры по параметрам</div>
<div class="filters__blok__items">
	<div class="filters_block__filter">
		<div class="filters_block__filter__title">Цена</div>
		<div class="filters_block__filter__item-list inline">
			<input class="valueFrom" type="text" name="" id="">
			<input class="valueTo" type="text" name="" id="">
		</div>
		<span class="irs irs--round js-irs-0"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="visibility: hidden;">0</span><span class="irs-max" style="visibility: visible;">10 000</span><span class="irs-from" style="visibility: hidden; left: 4.21169%;">200</span><span class="irs-to" style="visibility: hidden; left: 6.92321%;">500</span><span class="irs-single" style="visibility: visible; left: 5.56745%;">200 — 500</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 6.6157%; width: 2.71152%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-handle from" style="left: 1.80768%;"><i></i><i></i><i></i></span><span class="irs-handle to type_last" style="left: 4.5192%;"><i></i><i></i><i></i></span></span><input type="text" class="js-range-slider irs-hidden-input" name="my_range" value="" tabindex="-1" readonly="">
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
								<a href="#"><span>Сбросить фильтры</span></a>
							</div>


						</div>