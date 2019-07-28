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

