<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arFilter = Array("IBLOCK_ID"=>'11', "ACTIVE"=>"Y");

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

$arResult["SECTIONS"] = $sections;

$arFilter = Array("IBLOCK_ID"=>'11', "ACTIVE"=>"Y", "!ID" => $arResult['ID']);

$dbSection = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false);
$elements = [];

while ($dbelement = $dbSection->Fetch()) {	
	$elements[] = $dbelement;
}
$selected_elements_keys = array_rand($elements, 2);
$selected_elements = [
	$elements[$selected_elements_keys[0]],
	$elements[$selected_elements_keys[1]],
];

$arResult["SIMILAR"] = $selected_elements;

// echo '<pre>';
// var_dump ($selected_elements);