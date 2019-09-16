<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


$res = \Bitrix\Sale\Location\LocationTable::getList(array(
    'runtime' => array(
        'SUB' => array(
            'data_type' => '\Bitrix\Sale\Location\Location',
            'reference' => array(
                '>=ref.LEFT_MARGIN' => 'this.LEFT_MARGIN',
                '<=ref.RIGHT_MARGIN' => 'this.RIGHT_MARGIN'
            ),
            'join_type' => "inner"
        )
    ),
    'filter' => array(
        '=CODE' => $_POST['city'],
        '=SUB.NAME.LANGUAGE_ID' => LANGUAGE_ID,
        '=S_TYPE_CODE' => "CITY",
    ),
    'select' => array(
        'S_CODE' => 'SUB.CODE',
        'S_NAME_RU' => 'SUB.NAME.NAME',
        'S_TYPE_CODE' => 'SUB.TYPE.CODE',
        'CODE'        =>  'CODE',
        'ID'          =>  'SUB.ID'
    )
));
while($item = $res->fetch())
{
    $re[] = $item;
}

array_multisort(array_column($re, 'S_NAME_RU'), SORT_ASC, $re);
print_r(json_encode($re));

die;