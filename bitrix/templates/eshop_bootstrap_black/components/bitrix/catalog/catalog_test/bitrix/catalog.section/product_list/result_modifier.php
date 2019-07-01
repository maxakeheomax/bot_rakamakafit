<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$widthPreview = 260;
$heightPreview = 260;

$arSection = array();
$arResult["ITEMS_SECTION"] = array();
$maxElement = $arParams["PAGE_ELEMENT_COUNT"];
$countMaxElement = 0;
foreach ($arResult["ITEMS"] as $count=>$arItem) {
    if ($arItem["DETAIL_PICTURE"]) {
        $file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=> $widthPreview, 'height'=> $heightPreview), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arItem["PREVIEW_PICTURE"]["SRC"] = $file["src"];
        $arItem["PREVIEW_PICTURE"]["WIDTH"] = $file["width"];
        $arItem["PREVIEW_PICTURE"]["HEIGHT"] = $file["height"];
    } elseif($arItem["PREVIEW_PICTURE"]) {
        $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=> $widthPreview, 'height'=> $heightPreview), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arItem["PREVIEW_PICTURE"]["SRC"] = $file["src"];
        $arItem["PREVIEW_PICTURE"]["WIDTH"] = $file["width"];
        $arItem["PREVIEW_PICTURE"]["HEIGHT"] = $file["height"];
    }

    $resGroup = CIBlockElement::GetElementGroups($arItem["ID"], true);
    while($arGroup = $resGroup->Fetch()) {
        $arGroups[] = $arGroup;
        $arSection[$arGroup["ID"]] = $arGroup;
        $arResult["ITEMS_SECTION"][$arGroup["ID"]][] = $arItem;
    }
    if ($countMaxElement < $maxElement) {
        $arResult["ITEMS_SECTION"][0][] = $arItem;
        $countMaxElement += 1;
    }
}
$arResult["SECTIONS"] = $arSection;

foreach ($arResult["PROPERTIES"] as $pid => &$arProp)
{
   // Не выводим для просмотра свойства с сортировкой мнеьше 0 (они будут у нас служебными)
   if ($arProp["SORT"] < 0)
      continue;

   if((is_array($arProp["VALUE"]) && count($arProp["VALUE"])>0) ||
   (!is_array($arProp["VALUE"]) && strlen($arProp["VALUE"])>0))
   {
      $arResult["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arResult, $arProp);
   }
}

// if ($_GET["sort"] == "price")
// {
// $arParams["TOP_ELEMENT_SORT_FIELD"] = "property_PRICE_1";
// $price="asortvibor";
// $brend="";
// }
// if ($_GET["sort"] == "Brend")
// {
// $arParams["TOP_ELEMENT_SORT_FIELD"] = "property_Brendy";
// $brend="asortvibor";
// $price="";
// }

