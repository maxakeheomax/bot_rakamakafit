<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

CModule::IncludeModule("catalog");

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

$months = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
Loc::loadMessages(__FILE__);
if (!empty($arResult['ERRORS']['FATAL'])) {
    foreach ($arResult['ERRORS']['FATAL'] as $error) {
        ShowError($error);
    }
    $component = $this->__component;
    if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])) {
        $APPLICATION->AuthForm('', false, false, 'N', false);
    }
} else {
    if (!empty($arResult['ERRORS']['NONFATAL'])) {
        foreach ($arResult['ERRORS']['NONFATAL'] as $error) {
            ShowError($error);
        }
    }
    if (!count($arResult['ORDERS'])) {
        if ($_REQUEST["filter_history"] == 'Y') {
            if ($_REQUEST["show_canceled"] == 'Y') {
                ?>
<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER') ?></h3>
<?
            } else {
                ?>
<div class="personal-cabinet-block__content__page">


    <div class="personal-cabinet-block__content__page-item">
        <div class="personal-cabinet-block__title">У вас пока нет заказов</div>
        <div class="user_info">
            <div class="card_item">
                <p class="user_adress">Начните с каталога — может, найдётся что-то вам по вкусу :)</p>
                <button class="to_catalog personal-cabinet-block__form__submit" type="submit">Перейти в каталог</button>
            </div>
        </div>
    </div>



</div>
<?
            }
        } else {
            ?>
<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST') ?></h3>
<?
        }
    }


    if ($_REQUEST["filter_history"] !== 'Y') {
        $paymentChangeData = array();
        $orderHeaderStatus = null;

        foreach ($arResult['ORDERS'] as $key => $order) {
            //debug($order);
            if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $arResult['SORT_TYPE'] == 'STATUS') {
                $orderHeaderStatus = $order['ORDER']['STATUS_ID'];
            }
            ?>
<?
            $rsUser = CUser::GetByID($USER->GetID());
            $arUser = $rsUser->Fetch();
            ?>
<? } ?>
<div class="orders personal-cabinet-block__content__page">
    <?
            $rsUser = CUser::GetByID($USER->GetID());
            $arUser = $rsUser->Fetch();
            ?>

    <? //debug($arResult['ORDERS'])
            ?>
    <? foreach ($arResult['ORDERS'] as $arOrder) : ?>

    <?

                $res = CSaleBasket::GetList(array(), array("ORDER_ID" => $arOrder['ORDER']['ID'])); // ID заказа
                while ($arItem = $res->Fetch()) {
                    $mxResult = CCatalogSku::GetProductInfo($arItem['PRODUCT_ID']);
                    if (!empty($mxResult)) {
                        $id = $mxResult['ID'];
                    } else {
                        $id = $arItem['PRODUCT_ID'];
                    }
                    $arSelect = array("PREVIEW_PICTURE", "DETAIL_PICTURE", "ID");
                    $arFilter = array("IBLOCK_ID" => 15); // Здесь надо поставить ваш ID инфоблока.
                    $res = CIBlockElement::GetList(array("ID" => "ASC"), $arFilter, false, false, $arSelect);
                    while ($ob = $res->Fetch()) {
                        if ($ob['ID'] == $id) {
                            if (!empty($ob['PREVIEW_PICTURE'])) {
                                $picture = CFile::GetPath(($ob['PREVIEW_PICTURE']));
                            } else {
                                $picture = CFile::GetPath($ob['DETAIL_PICTURE']);
                            }
                        }
                    }
                }


                $db_props = CSaleOrderPropsValue::GetOrderProps($arOrder['ORDER']['ID']);
                $rsUser = CUser::GetByID($USER->GetID());
                $arUser = $rsUser->Fetch();
                while ($arProps = $db_props->Fetch()) {
                    if ($arProps['ORDER_PROPS_ID'] == 7 && !empty($arProps['VALUE'])) {
                        $adres = $arProps['VALUE'];
                    } elseif ($arProps['ORDER_PROPS_ID'] == 7 && empty($arProps['VALUE'])) {
                        $adres = $arUser['PERSONAL_STREET'];
                    }
                }
                ?>
    <div class="personal-cabinet-block__content__page-item">
        <div class="order_title-block flex-line">
            <div class="personal-cabinet-block__title">Заказ № <?= $arOrder['ORDER']['ACCOUNT_NUMBER'] ?></div>
            <div class="order-date">Дата заказа: <?= $arOrder['ORDER']['DATE_INSERT_FORMATED'] ?></div>
        </div>
        <? foreach ($arOrder['BASKET_ITEMS'] as $arItem) : ?>
        <div class="cart-block__cart-items-list__item d-table">
            <div class="item__image d-table__cell">
                <img src="<?= $picture ?>" alt="">
            </div>
            <div class="cart-block__item__info d-table__cell">
                <a href="	#"><?= $arItem['NAME'] ?></a>
            </div>

            <div class="cart-block__item__price d-table__cell">
                <p class="actual-price price"><span><?= number_format($arItem['PRICE'], 2, '.', ' '); ?></span> Р</p>
                <!--p class="old-price price"><span>2210 Р</span> </p>
                                    <p class="discount-price price">Скидка <span>520 Р</span></p-->
            </div>
        </div>
        <? endforeach; ?>

        <hr>

        <div class="order_info" style="display:none">
            <div class="flex-line">
                <div class="order_param">
                    <div class="order__param__name">Статус</div>
                    <? foreach ($order['SHIPMENT'] as $arItem) : ?>
                    <p class="order__param__value"><?= $arItem['DELIVERY_STATUS_NAME'] ?></p>
                    <? endforeach; ?>
                </div>
                <div class="order_param">
                    <div class="order__param__name">Параметры оплаты</div>
                    <? foreach ($order['PAYMENT'] as $arItem) : ?>
                    <p class="order__param__value"><?= $arItem['PAY_SYSTEM_NAME'] ?></p>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="order_param">
                <div class="order__param__name">Дата доставки</div>
                <p class="order__param__value">четверг, июн 20, 2019 - воскресенье, июл 21, 2019</p>
            </div>
            <div class="order_param">
                <div class="order__param__name">Адрес доставки</div>
                <p class="order__param__value"><?= $adres ?></p>
            </div>
        </div>
        <div class="order_manage_buttons flex-line">
            <div class="repeat_button"> <span><i class="fas fa-redo-alt"></i>
                </span>
                <a class="sale-order-list-repeat-link" href="<?= htmlspecialcharsbx($arOrder["ORDER"]["URL_TO_COPY"]) ?>"><?= Loc::getMessage('SPOL_TPL_REPEAT_ORDER') ?></a>

            </div>
            <div class="cancel_button">Показать</div>
        </div>
    </div>
    <? endforeach; ?>

</div>

<?
    } else {
        $orderHeaderStatus = null;

        if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS'])) {
            ?>
<h1 class="sale-order-title">
    <?= Loc::getMessage('SPOL_TPL_ORDERS_CANCELED_HEADER') ?>
</h1>
<?
        }
        ?>
<div class="orders personal-cabinet-block__content__page">
    <?
            $rsUser = CUser::GetByID($USER->GetID());
            $arUser = $rsUser->Fetch();
            ?>
    <? foreach ($arResult['finished'] as $arOrder) : ?>
    <div class="personal-cabinet-block__content__page-item">
        <div class="order_title-block flex-line">
            <div class="personal-cabinet-block__title">Заказ № <?= $arOrder['number'] ?></div>
            <div class="order-date">Дата заказа: <?= date('d.m.Y H:i:s', strtotime($arOrder['createdAt']))?></div>
        </div>
        <? foreach($arOrder['items'] as $article) : ?>
            <?
            $arFilter = array("IBLOCK_ID" => 15, "PROPERTY_ARTNUMBER" => $article['offer']['xmlId']); // Здесь надо поставить ваш ID инфоблока.
            $res = CIBlockElement::GetList(array("ID" => "ASC"), $arFilter, false, false, $arSelect);
            $ob = $res->Fetch()
            ?>
            <div class="cart-block__cart-items-list__item d-table">
                <div class="item__image d-table__cell">
                    <img src="<?= CFile::GetPath(($ob['PREVIEW_PICTURE'])) ?>" alt="">
                </div>
                <div class="cart-block__item__info d-table__cell">
                    <a href="#"><?= $article['offer']['displayName'] ?></a>
                </div>

                <div class="cart-block__item__price d-table__cell">
                    <p class="actual-price price"><span><?= number_format($article['purchasePrice'], 2, '.', ' '); ?></span> Р</p>
                    <!-- p class="old-price price"><span>2210 Р</span> </p>
                                <p class="discount-price price">Скидка <span>520 Р</span></p-->
                </div>
            </div>
        <? endforeach ?>

        <hr>
        
        <div class="order_info" style="display: none">
            <div class="flex-line">
                <div class="order_param">
                    <div class="order__param__name">Статус</div>
                    <p class="order__param__value"><?=($arOrder['delivery']['data']['statusText'])?$arOrder['delivery']['data']['statusText']:'-'?></p>
                    <? /*foreach ($order['SHIPMENT'] as $arItem) : */?>
                    <!-- <p class="order__param__value"><?= $arItem['DELIVERY_STATUS_NAME'] ?></p> -->
                    <?/* endforeach; */?>
                </div>
                <!-- <div class="order_param">
                    <div class="order__param__name">Параметры оплаты</div>
                    <? foreach ($order['PAYMENT'] as $arItem) : ?>
                    <p class="order__param__value"><?= $arItem['PAY_SYSTEM_NAME'] ?></p>
                    <? endforeach; ?>
                </div> -->
            </div>
            <? if ($arOrder['delivery']['date']) : ?>
            <div class="order_param">
                
                <div class="order__param__name">Дата доставки</div>
                <p class="order__param__value">
                    <?=date('d', strtotime($arOrder['delivery']['date'])).' '.
                    $months[(int)date('m', strtotime($arOrder['delivery']['date']))].' '.
                    date('Y', strtotime($arOrder['delivery']['date']))?>
                </p>
            </div>
            <? endif ?>
            <div class="order_param">
                <div class="order__param__name">Адрес доставки</div>
                <p class="order__param__value"><?=$arOrder['delivery']['address']['cityType']?>&nbsp;<?=$arOrder['delivery']['address']['city']?>
                <?=$arOrder['delivery']['address']['text']?>
            </p>
            </div>
        </div>
        <div class="order_manage_buttons flex-line">
            <div class="repeat_button"> <span><i class="fas fa-redo-alt"></i></span>
                <a class="sale-order-list-repeat-link" href="<?= htmlspecialcharsbx($arOrder["ORDER"]["URL_TO_COPY"]) ?>"><?= Loc::getMessage('SPOL_TPL_REPEAT_ORDER') ?></a>
            </div>
            <div class="cancel_button">Показать</div>
        </div>
    </div>
    <? endforeach; ?>

</div>

<?
    }
    ?>
<div class="clearfix"></div>
<?
    echo $arResult["NAV_STRING"];

    if ($_REQUEST["filter_history"] !== 'Y') {
        $javascriptParams = array(
            "url" => CUtil::JSEscape($this->__component->GetPath() . '/ajax.php'),
            "templateFolder" => CUtil::JSEscape($templateFolder),
            "templateName" => $this->__component->GetTemplateName(),
            "paymentList" => $paymentChangeData
        );
        $javascriptParams = CUtil::PhpToJSObject($javascriptParams);
        ?>
<script>
    BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?= $javascriptParams ?>);
</script>
<?
    }
}



?>