<?
// подключение служебной части пролога

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$APPLICATION->RestartBuffer();
if (!defined('PUBLIC_AJAX_MODE')) {
    define('PUBLIC_AJAX_MODE', true);
}
header('Content-type: application/json');
?>

<?

global $USER;
if (!is_object($USER)) $USER = new CUser;

$arResult = $USER->Register($_POST["mail"], $_POST["name"], "", $_POST['password'], $_POST['repeat-password'], $_POST['mail']);

if ($arResult['TYPE'] == "ERROR") {
    echo json_encode(array(
        'type' => 'error',
        'message' => strip_tags($arAuthResult['MESSAGE']),        
    ));
} else {
    echo json_encode(array(
        'type' => 'Ok',
        'name' => $_POST["name"]
    ));      
}
?>

 

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>