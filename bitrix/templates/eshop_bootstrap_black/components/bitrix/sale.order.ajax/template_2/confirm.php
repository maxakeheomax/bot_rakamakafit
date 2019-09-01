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
        <?
        if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y') {
            if (!empty($arResult["PAYMENT"])) {
                foreach ($arResult["PAYMENT"] as $payment) {
                    if ($payment["PAID"] != 'Y') {
                        if (!empty($arResult['PAY_SYSTEM_LIST'])
                            && array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
                        ) {
                            $arPaySystem = $arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment["ID"]];

                            if (empty($arPaySystem["ERROR"])) { ?>
                                <? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
                                    <?
                                        $orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
                                        $paymentAccountNumber = $payment["ACCOUNT_NUMBER"]; ?>
                                        <script>
                                            window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
                                        </script>
                                    <?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
                                    <? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
                                    <br/>
                                        <?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
                                    <? endif ?>
                                    <? else: ?>
                                        <?=$arPaySystem["BUFFERED_OUTPUT"]?>
                                    <? endif ?>
                        <? } else { ?>
                            <span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
                        <? }
                        } else { ?>
                            <span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
                        <? }
                    }
                }
            }
        } else { ?>
            <br /><strong><?=$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']?></strong>
        <? } ?>
    </div>


<? endif ?>