<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}



else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS']))
	{
		if ($_REQUEST["filter_history"] == 'Y')
		{
			if ($_REQUEST["show_canceled"] == 'Y')
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
				<?
			}
			else
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
				<?
			}
		}
		else
		{
			?>
			<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></h3>
			<?
		}
	}


	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$paymentChangeData = array();
		$orderHeaderStatus = null;

		foreach ($arResult['ORDERS'] as $key => $order)
		{
            //debug($order);
			if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $arResult['SORT_TYPE'] == 'STATUS')
			{
				$orderHeaderStatus = $order['ORDER']['STATUS_ID'];
			}
			?>
            <?
                $rsUser = CUser::GetByID($USER->GetID());
                $arUser = $rsUser->Fetch();
            ?>
            <div class="orders personal-cabinet-block__content__page">
                <?
                $rsUser = CUser::GetByID($USER->GetID());
                $arUser = $rsUser->Fetch();
                ?>
                <?foreach ($arResult['ORDERS'] as $arOrder):?>
                    <div class="personal-cabinet-block__content__page-item">
                        <div class="order_title-block flex-line">
                            <div class="personal-cabinet-block__title">Заказ № <?=$arOrder['ORDER']['ACCOUNT_NUMBER']?></div>
                            <div class="order-date">Дата заказа: <?=$arOrder['ORDER']['DATE_INSERT_FORMATED']?></div>
                        </div>
                        <?foreach ($arOrder['BASKET_ITEMS'] as $arItem):?>
                            <div class="cart-block__cart-items-list__item d-table">
                                <div class="item__image d-table__cell">
                                    <img src="assets/cart-items-list-img.jpg" alt="">
                                </div>
                                <div class="cart-block__item__info d-table__cell">
                                    <a href="	#"><?=$arItem['NAMR']?></a>
                                    <div class="cart-block__item__meta">	160 гр.</div>
                                </div>

                                <div class="cart-block__item__price d-table__cell">
                                    <p class="actual-price price"><span><?=$arItem['PRICE']?></span> Р</p>
                                    <!--p class="old-price price"><span>2210 Р</span> </p>
                                    <p class="discount-price price">Скидка <span>520 Р</span></p-->
                                </div>
                            </div>
                        <?endforeach;?>

                        <hr>

                        <div class="order_info">
                            <div class="flex-line">
                                <div class="order_param">
                                    <div class="order__param__name">Статус</div>
                                    <?foreach ($order['SHIPMENT'] as $arItem):?>
                                    <p class="order__param__value"><?=$arItem['DELIVERY_STATUS_NAME']?></p>
                                        <?endforeach;?>
                                </div>
                                <div class="order_param">
                                    <div class="order__param__name">Параметры оплаты</div>
                                    <?foreach ($order['PAYMENT'] as $arItem):?>
                                        <p class="order__param__value"><?=$arItem['PAY_SYSTEM_NAME']?></p>
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="order_param">
                                <div class="order__param__name">Дата доставки</div>
                                <p class="order__param__value">четверг, июн 20, 2019 - воскресенье, июл 21, 2019</p>
                            </div>
                            <div class="order_param">
                                <div class="order__param__name">Адрес доставки</div>
                                <p class="order__param__value"><?=$arUser['PERSONAL_STREET']?></p>
                            </div>
                        </div>
                        <div class="order_manage_buttons flex-line">
                            <div class="repeat_button"> <span><i class="fas fa-redo-alt"></i>
								</span>
                                <a class="sale-order-list-repeat-link" href="<?=htmlspecialcharsbx($arOrder["ORDER"]["URL_TO_COPY"])?>"><?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?></a>

                            </div>
                            <div class="cancel_button">Скрыть</div>
                        </div>
                    </div>
                <?endforeach;?>

            </div>
			<?
		}
	}
	else
	{
		$orderHeaderStatus = null;

		if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS']))
		{
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
            <?foreach ($arResult['ORDERS'] as $arOrder):?>
                <div class="personal-cabinet-block__content__page-item">
                <div class="order_title-block flex-line">
                    <div class="personal-cabinet-block__title">Заказ № <?=$arOrder['ORDER']['ACCOUNT_NUMBER']?></div>
                    <div class="order-date">Дата заказа: <?=$arOrder['ORDER']['DATE_INSERT_FORMATED']?></div>
                </div>
                <?foreach ($arOrder['BASKET_ITEMS'] as $arItem):?>
                    <div class="cart-block__cart-items-list__item d-table">
                        <div class="item__image d-table__cell">
                            <img src="assets/cart-items-list-img.jpg" alt="">
                        </div>
                        <div class="cart-block__item__info d-table__cell">
                            <a href="	#"><?=$arItem['NAMR']?></a>
                            <div class="cart-block__item__meta">	160 гр.</div>
                        </div>

                        <div class="cart-block__item__price d-table__cell">
                            <p class="actual-price price"><span><?=$arItem['PRICE']?></span> Р</p>
                            <!--p class="old-price price"><span>2210 Р</span> </p>
                            <p class="discount-price price">Скидка <span>520 Р</span></p-->
                        </div>
                    </div>
                <?endforeach;?>

                <hr>

                <div class="order_info">
                    <div class="flex-line">
                        <div class="order_param">
                            <div class="order__param__name">Статус</div>
                            <?foreach ($order['SHIPMENT'] as $arItem):?>
                                <p class="order__param__value"><?=$arItem['DELIVERY_STATUS_NAME']?></p>
                            <?endforeach;?>
                        </div>
                        <div class="order_param">
                            <div class="order__param__name">Параметры оплаты</div>
                                <?foreach ($order['PAYMENT'] as $arItem):?>
                                    <p class="order__param__value"><?=$arItem['PAY_SYSTEM_NAME']?></p>
                                <?endforeach;?>
                        </div>
                    </div>
                    <div class="order_param">
                        <div class="order__param__name">Дата доставки</div>
                        <p class="order__param__value">четверг, июн 20, 2019 - воскресенье, июл 21, 2019</p>
                    </div>
                    <div class="order_param">
                        <div class="order__param__name">Адрес доставки</div>
                        <p class="order__param__value"><?=$arUser['PERSONAL_STREET']?></p>
                    </div>
                </div>
                <div class="order_manage_buttons flex-line">
                    <div class="repeat_button"> <span><i class="fas fa-redo-alt"></i>
								</span>
                        <a class="sale-order-list-repeat-link" href="<?=htmlspecialcharsbx($arOrder["ORDER"]["URL_TO_COPY"])?>"><?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?></a>

                    </div>
                    <div class="cancel_button">Скрыть</div>
                </div>
            </div>
            <?endforeach;?>

        </div>

        <?
	}
	?>
	<div class="clearfix"></div>
	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}



?>
