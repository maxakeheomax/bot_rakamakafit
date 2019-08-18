<?php
$section_code = explode('/',$APPLICATION->GetCurUri())[3];
if ($section_code) {
    $arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y", "CODE"  =>$section_code);
    $dbSection = CIBlockSection::GetList(Array(), $arFilter, false)->Fetch();
    $dbEl = CIBlockElement::GetList([],["IBLOCK_ID"=>'13', "SECTION_ID"   => $dbSection['ID']]);
    while($e = $dbEl->Fetch()) {
        $elements[] = $e;
    }
    $arResult['elements'] = $elements;
}