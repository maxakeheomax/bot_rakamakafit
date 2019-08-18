<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
//remove items
global $USER;
$user = new \CUser;
$fields = Array(
    'PERSONAL_CITY' =>'',
    'PERSONAL_STREET'=>'',
);
$user->Update($USER->GetID(), $fields);