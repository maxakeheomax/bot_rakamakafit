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
		<?foreach($arResult["ITEMS"] as $arItem):
			if(array_key_exists("HIDDEN", $arItem)):
				echo $arItem["INPUT"];
			endif;
		endforeach;
		// var_dump($arResult["ITEMS"]);
		// die;
		var_dump($_GET);

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
						<?foreach($arResult["ITEMS"]["OFFER_PROPERTY_122"]['LIST'] as $key => $arItem):?>
							<li><input name="arrFilter_op[MATERIAL][]" id="length_filter_id-<?=$key?>" type="checkbox" value="<?=$key?>" <? if(in_array($key, $_GET['arrFilter_op']['MATERIAL'])) echo 'checked="checked"'; ?> ><label for="length_filter_id-<?=$key?>"> <?=$arItem?> </label></li>
						<?endforeach;?>						
					</ul>						
				</div>
			</div>
			<div class="filters_block__filter">
				<div class="filters_block__filter__title">Длина, см (по окружности)</div>
				<div class="filters_block__filter__item-list">
					<ul>						
						<?foreach($arResult["ITEMS"]["OFFER_PROPERTY_123"]['LIST'] as $key => $arItem):?>
							<li><input name="arrFilter_op[LENGTH][]" id="filter_id-<?=$key?>" type="checkbox" value="<?=$key?>" <? if(in_array($key, $_GET['arrFilter_op']['LENGTH'])) echo 'checked="checked"'; ?> ><label for="filter_id-<?=$key?>"> <?=$arItem?> </label></li>
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