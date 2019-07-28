<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
}
?>

<? if (!empty($arResult["ORDER"])): ?>

    <?
    $db_props = CSaleOrderPropsValue::GetOrderProps($arResult['ORDER_ID']);
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
    while ($arProps = $db_props->Fetch())
    {
        if($arProps['ORDER_PROPS_ID'] == 7 && !empty($arProps['VALUE'])){
            $adres = $arProps['VALUE'];
        } elseif($arProps['ORDER_PROPS_ID'] == 7 && empty($arProps['VALUE'])) {
            $adres = $arUser['PERSONAL_STREET'];
        }
    }
    

    ?>
    <div class="thanks-for-order-block">
        <div class="thumbs_up" style="font-size: 85px;background:url(/upload/thumbs-up-sign.png) no-repeat; background-size: contain;"></div>
        <div class="up-hello-block__left-side__title">Спасибо, что выбрали RAKAMAKAFIT!</div>
        <p class="desc">Ваш заказ подтвержден, и мы сообщим вам, когда он будет отправлен.
            Он будет отправлен по адресу: <?=$adres?>
        </p>
    </div>


<? endif ?>