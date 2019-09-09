<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
  
<?
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
/* Addition of the goods in a basket at addition in a basket */
if($_POST["ajaxaddid"] && $_POST["ajaxaction"] == 'add'){
    Add2BasketByProductID($_POST["ajaxaddid"], 1, array());
}
/* Goods removal at pressing on to remove in a small basket */
if($_POST["countbasketid"] && $_POST["ajaxaction"] == 'delete'){
    CSaleBasket::Delete($_POST["countbasketid"]);
}
/* Changes of quantity of the goods after receipt of inquiry from a small basket */
if($_POST["countbasketid"] && $_POST["count"] && $_POST["ajaxaction"] == 'update'){
    $arFields = array(
       "QUANTITY" => $_POST["count"]
    );
    CSaleBasket::Update($_POST["countbasketid"], $arFields);
}
  

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
    \Bitrix\Sale\Fuser::getId(),
    \Bitrix\Main\Context::getCurrent()->getSite()
);
$basketQntList = $basket->getQuantityList();
$cnt = 0;
foreach ($basketQntList as $val) {
    $cnt += $val;
}
$total = number_format($basket->getBasePrice(), 2, '.', ' ');
$discount = number_format($basket->getBasePrice()-$basket->getPrice(), 2, '.', ' ');
$finish = number_format($basket->getPrice(), 2, '.', ' ');

$basketItems = $basket->getBasketItems();
$items = [];
foreach ($basketItems as $basketItem) {
    $items[$basketItem->GetField('ID')] = number_format($basketItem->getQuantity() * $basketItem->getPrice(), 2, '.',' ');
    // echo $basketItem->getField('NAME') . ' - ' . $basketItem->getQuantity() . '<br />';
}

echo json_encode([
    "count"     => $cnt,
    "total"     => $total,
    "discount"  => $discount,
    "finish"    => $finish,
    'items'     => $items
]);
    
?>