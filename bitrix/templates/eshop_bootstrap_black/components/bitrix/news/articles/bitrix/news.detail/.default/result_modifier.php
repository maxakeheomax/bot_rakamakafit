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
// echo '<pre>';
// var_dump ($arResult["SECTIONS"]);