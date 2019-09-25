<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

define(safeRouteTOKEN, '_x13hcccdvioiuqmf1g7sxovogvalvpi');
// const $safeRouteTOKEN = '_x13hcccdvioiuqmf1g7sxovogvalvpi';
$allDeliveries = CSaleDelivery::GetLocationList(
    array(
       'LOCATION_ID' => $_POST['PERSONAL_CITY'],
       'LOCATION_TYPE' => 'L',
       "ACTIVE"        => "Y"
    )
);
// print_r($allDeliveries); 
while($location = $allDeliveries->Fetch()) {
    $locations[] = $location['DELIVERY_ID'];
}
$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
    \Bitrix\Sale\Fuser::getId(),
    \Bitrix\Main\Context::getCurrent()->getSite()
);
$weight = $basket->getWeight();
$return = [
    '18'        => [
        'price'     =>  'Недоступно для вашего региона',
    ],
    '2'        => [
        'price'     =>  'Недоступно для вашего региона',
    ],
    '3'        => [
        'price'     =>  'Недоступно для вашего региона',
    ],
    'pvz'       => [
        'price'     =>  'Недоступно для вашего региона',
    ],
    'courier'       => [
        'price'     =>  'Недоступно для вашего региона',
    ],
];
$pvz = [];
// print_r($locations);
foreach($locations as $locs) {
    if ($locs == 18) {
        $post = calcRussianPost($weight);
        if (isset($post['pkg']))
            $return[$locs]['price'] = $post['pkg'];
        else 
            $return[$locs]['price'] = 'Ошибка. Проверьте адрес.';
        //russian post
    }
    if ($locs == 'SafeRoute') {
        $city = CSaleLocation::GetByID($_POST['PERSONAL_CITY'])['CITY_NAME_ORIG'];
        $safeRouteCity = safeRouteCity($city);
        if (!empty($safeRouteCity)) {
            $safeRouteDelivery = calcSafeRoute($safeRouteCity, $weight);
            if (isset($safeRouteDelivery['2']['delivery'][0]['total_price'])) {
                $return['courier']['price'] = $safeRouteDelivery['2']['delivery'][0]['total_price'];
            } else {
                $return['courier']['price'] = 'Ошибка. Проверьте адрес.';
            }
            $safeRoutePVZ = getPVZ($safeRouteCity);
            if (isset($safeRoutePVZ['1']['points'])) {
                foreach($safeRoutePVZ['1']['points'] as $srPVZ) {
                    $pvz[$srPVZ['id']] = [
                        'longitude'     => $srPVZ['longitude'],
                        'latitude'      => $srPVZ['latitude'],
                        'address'       => $srPVZ['address'],
                        'price'         => $srPVZ['price_delivery']
                    ];
                }
            }
        } else {
            $return[$locs] = 'Недоступно для вашего региона';
        }
    }
    if ($locs == 'courier') {
        $return['courier']['price'] = '300';
    }
}

if (in_array(3, $locations)) {
    $pvz['1']   = [
        'longitude'     => "37.73785685581972",
        'latitude'      => "55.73652938838389",
        'address'       => 'г.Москва,  шоссе Фрезер, д.17 А, стр 2',
        'price'         => '0'
    ];
}
if (!empty($pvz)) {
    $return['pvz']['price'] = 'Выберите пункт выдачи';
}
$return['pvz']['pvz']  = $pvz;
print_r(Json_encode($return));

function calcRussianPost($weight) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://postprice.ru/engine/russia/api.php?from=101000&to=".$_POST['index']."&mass=".$weight);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch); 
    curl_close($ch); 
    return json_decode($result,1);
}

function safeRouteCity($city) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.saferoute.ru/api/".safeRouteTOKEN."/list/city.json?name=".$city);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $result_city = curl_exec($ch); 
    curl_close($ch); 
    return json_decode($result_city,1)[0]['id'];
}

function calcSafeRoute($city, $weight) {
    $weight = $weight/1000;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.saferoute.ru/api/".safeRouteTOKEN."/calculator.json?city_to=".$city."&side1=50&side2=50&side3=50&weight=".$weight."&item_count=1&type=2&is_cheap=1&is_declared=1&is_payment=0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch); 
    curl_close($ch); 
    return @json_decode($result,1)['data'];
}

function getPVZ($city) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.saferoute.ru/api/".safeRouteTOKEN."/calculator.json?city_to=".$city."&side1=50&side2=50&side3=50&weight=4&item_count=1&type=1&is_cheap=0&is_declared=1&is_payment=0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch); 
    curl_close($ch); 
    return @json_decode($result,1)['data'];
}

die;