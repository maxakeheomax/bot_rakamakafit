<?
var_dump('sasi');
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');


if (strlen($_POST['ajax_key']) && $_POST['ajax_key']==md5('ajax_'.LICENSE_KEY)) {
    $APPLICATION->RestartBuffer();
    if (!defined('PUBLIC_AJAX_MODE')) {
       define('PUBLIC_AJAX_MODE', true);
    }
    header('Content-type: application/json');
    if ($arResult['ERROR']) {
        echo json_encode(array(
          'type' => 'error',
          'message' => strip_tags($arResult['ERROR_MESSAGE']['MESSAGE']),
       ));
    } else {
       echo json_encode(array('type' => 'ok'));      
    }
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
    var_dump($_POST);
    die();
 }