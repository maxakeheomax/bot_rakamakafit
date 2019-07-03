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
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
			<!-- <div class="filters_block-title">Фильтры по параметрам</div>
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
					</div> -->
					<!-- <div class="filters_block__filter">
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
				</div> -->



		<?foreach($arResult["ITEMS"] as $arItem):
			if(array_key_exists("HIDDEN", $arItem)):
				echo $arItem["INPUT"];
			endif;
		endforeach;
		// var_dump($arResult["ITEMS"]);
		// var_dump($_GET);

		?>
		<div class="filters_block-title">Фильтры по параметрам</div>
		<div class="filters__blok__items">
			<div class="filters_block__filter" id="filter_price">
				<div class="filters_block__filter__title">Цена</div>
				<div class="filters_block__filter__item-list inline">					
					<input class="valueFrom" type="text" name="arrFilter_cf[1][LEFT]" id="" value="<?= $arResult["ITEMS"]['PRICE_BASE']['INPUT_VALUES'][0] ?>">
					<input class="valueTo" type="text" name="arrFilter_cf[1][RIGHT]" id="" value="<?= $arResult["ITEMS"]['PRICE_BASE']['INPUT_VALUES'][1] ?>">
				</div>
				<input type="text" class="js-range-slider" name="" value="" />
			</div>
			<div class="filters_block__filter width-block">
				<div class="filters_block__filter__title">Материал</div>
				<div class="filters_block__filter__item-list">
					<ul>						
						<?foreach($arResult["ITEMS"]["OFFER_PROPERTY_123"]['LIST'] as $key => $arItem):?>
							<li><input name="arrFilter_op[MATERIAL][]" id="filter_id-<?=$key?>" type="checkbox" value="<?=$key?>"><label for="filter_id-<?=$key?>"> <?=$arItem?> </label></li>
						<?endforeach;?>
					</ul>
				</div>
			</div>
			<div class="filters_block__filter">
				<div class="filters_block__filter__title">Длина, см (по окружности)</div>
				<div class="filters_block__filter__item-list">
					<ul>
						<?foreach($arResult["ITEMS"]["OFFER_PROPERTY_122"]['LIST'] as $key => $arItem):?>
							<li><input name="arrFilter_op[LENGTH][]" id="length_filter_id-<?=$key?>" type="checkbox" value="<?=$key?>"><label for="length_filter_id-<?=$key?>"> <?=$arItem?> </label></li>
						<?endforeach;?>						
					</ul>
				</div>
			</div>
			<div class="filters_block__filter">
				<div class="filters_block__filter__title">Вес</div>
				<div class="filters_block__filter__item-list inline">					
					<input class="valueFrom" type="text" name="arrFilter_op[WEIGHT][LEFT]" id="" value="<?= $_GET['arrFilter_op']['WEIGHT']['LEFT'] ?>">
					<input class="valueTo" type="text" name="arrFilter_op[WEIGHT][RIGHT]" id="" value="<?= $_GET['arrFilter_op']['WEIGHT']['RIGHT'] ?>">
				</div>				
			</div>
		</div>



		<input name="set_filter" class="promo-form-block__form__submit" type="submit" val="показать">
		<input type="hidden" name="set_filter" value="Y" />
		<div class="reset-filters">
		<a href="<?= $APPLICATION->GetCurPage(false) ?>"><span>Сбросить фильтры</span></a>
		</div>
		</table>
	</form>
</div>