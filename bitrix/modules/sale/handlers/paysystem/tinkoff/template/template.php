<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);
$dbRes = \Bitrix\Sale\Basket::getList([
    'select' => ['NAME', 'QUANTITY', "PRICE"],
    'filter' => [
        '=ORDER_ID' => $params['PAYMENT_ORDER_ID'],
        '=LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
        '=CAN_BUY' => 'Y',
    ]
]);
$i=0;
?>


<form id="myForm" action="https://loans.tinkoff.ru/api/partners/v1/lightweight/create" onsubmit="yaCounter44861320.reachGoal('credit'); return true;" method="post" class="creditForm">
	<input name="shopId" value="rakamakafit" type="hidden"/>
	<input name="showcaseId" value="rakamakafit" type="hidden"/>
	<input name="promoCode" value="default" type="hidden"/>
	<input name="sum" value="<?=$params['PAYMENT_SHOULD_PAY']?>.00" type="hidden">
	<? while ($item = $dbRes->fetch()) : ?>
	<input name="itemName_<?=$i?>" value="<?=$item['NAME']?>" type="hidden"/>
	<input name="itemQuantity_<?=$i?>" value="<?=(int)$item['QUANTITY']?>" type="hidden"/>
	<input name="itemPrice_<?=$i?>" value="<?=(int)$item['PRICE']?>.00" type="hidden"/>
	<?$i++;?>
	<? endwhile; ?>
	<input name="promoCode" value="installment_0_0_5" type="hidden" />
	<input type="submit" value="Купить в рассрочку" class="creditButton"/>
</form>
<script type="text/javascript">
    // document.getElementById('myForm').submit();
</script>