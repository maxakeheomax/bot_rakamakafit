<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$widthPreview = 260;
$heightPreview = 260;

$arSection = array();
$arResult["ITEMS_SECTION"] = array();
$maxElement = $arParams["PAGE_ELEMENT_COUNT"];
$countMaxElement = 0;

$arFilter = Array('DEPTH_LEVEL' => 2);
$sections = CIBlockSection::GetList([], $arFilter, true);
$arr_sections = null;
$menuList = array();
$lev = 0;
$lastInd = 0;
$parents = array();
// foreach ($sections as $arItem) {
//     $lev = $arItem['DEPTH_LEVEL'];
    
//     if ($arItem['IS_PARENT']) {
//         $arItem['CHILDREN'] = array();
//     }
    
//         if ($lev == 1) {
//         $menuList[] = $arItem;
//         $lastInd = count($menuList)-1;
//         $parents[$lev] = &$menuList[$lastInd];
//     } else {
//         $parents[$lev-1]['CHILDREN'][] = $arItem;
//         $lastInd = count($parents[$lev-1]['CHILDREN'])-1;
//         $parents[$lev] = &$parents[$lev-1]['CHILDREN'][$lastInd];
//     }
// }
// echo '<pre>'; var_dump($menuList); echo '</pre>';
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
        $arSection[0] = $arGroup;
        $arResult["ITEMS_SECTION"][$arGroup["ID"]][] = $arItem;
    }
    if ($countMaxElement < $maxElement) {
        $arResult["ITEMS_SECTION"][0][] = $arItem;
        $countMaxElement += 1;
    }
}
$arResult["SECTIONS"] = $arSection;

