<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;

?>
<?
/*$db_props = CSaleOrderPropsValue::GetOrderProps($arResult['ORDER_ID']);
while ($arProps = $db_props->Fetch())
{
    debug($arProps);
}*/

$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();

?>
<div class="thanks-for-order-block">
    <div class="thumbs_up" style="font-size: 85px;background:url(/upload/thumbs-up-sign.png) no-repeat; background-size: contain;"></div>
    <div class="up-hello-block__left-side__title">Спасибо, что выбрали RAKAMAKAFIT!</div>
    <p class="desc">Ваш заказ подтвержден, и мы сообщим вам, когда он будет отправлен.
        Он будет отправлен по адресу: <?=$arUser['PERSONAL_STREET']?>
    </p>
</div>
