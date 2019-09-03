<?php
$section_code = explode('/',$APPLICATION->GetCurUri())[3];
if ($section_code) {
    $arFilter = Array("IBLOCK_ID"=>'13', "ACTIVE"=>"Y", "CODE"  =>$section_code);
    $dbSection = CIBlockSection::GetList(Array(), $arFilter, false, ['*', "UF_*"])->Fetch();
    $arResult['section'] = $dbSection;
}