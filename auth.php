<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
 
$APPLICATION->RestartBuffer();
if (!defined('PUBLIC_AJAX_MODE')) {
    define('PUBLIC_AJAX_MODE', true);
}
header('Content-type: application/json');

$user_data = Bitrix\Main\UserTable::getList([
    'select' => [
        'LOGIN',
        'NAME'
    ],
    'filter' => [
        'LOGIN' => $_POST['mail']
    ]
])->fetch();
$user_login = $user_data['LOGIN'];
$user_name = $user_data['NAME'];

// print_r($user_login);
global $USER;
if (!is_object($USER)) $USER = new CUser;
if($_POST['remember']){
    $remember = 'Y';
}else{
    $remember = 'N';
}
$arAuthResult = $USER->Login($user_login, $_POST['password'], $remember, 'Y');
$APPLICATION->arAuthResult = $arAuthResult;



if ($arAuthResult['TYPE'] == "ERROR") {
    echo json_encode(array(
        'type' => 'error',
        'message' => strip_tags($arAuthResult['MESSAGE']),
    ));
} else {
    echo json_encode(array(
        'type' => 'Ok',
        'name' => $user_name
    ));      
}
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');

die();
//  }