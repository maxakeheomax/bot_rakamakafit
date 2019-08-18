<?php

namespace user;

class User extends controller {

    //create customer
    public static function add(&$arFields) {
        if (!$arFields['RESULT_MESSAGE']) {
            //get by email
            $requestFields = [
                'filter'    =>  [
                    'email'     =>  $arFields['LOGIN'],
                ]
            ];
            $return = self::request("GET", "customers", $requestFields);
            if (empty($return['customers'])) {
                //if no customer
                $requestFields = [
                    'customer'      => [
                        'firstName'     => $arFields['NAME'],
                        'email'         => $arFields['LOGIN'],
                    ]
                ];
                $return = self::request("POST", "customers/create", $requestFields);
                //add logs
                if ($return)
                    echo 'гуд';
            } else {
                $customer = $return['customers'];
                // $arFields['NAME']            = $customer['firstName'];
                $arFields['PERSONAL_CITY']   = $customer['address']['city'];
                $arFields['PERSONAL_STREET'] = $customer['address']['text'];

                $requestFields = [
                    'customer'  => [
                        'firstName'     => $arFields['NAME']
                    ]
                ];
                self::request("POST", "customers/".$return['customers']['id']."/edit", $requestFields);
            }
        }
    }

    public static function getFinishOrders($id) {
        //todo add cache
        $userAll = \CUser::GetByID($id)->Fetch();
        $requestFields = [
            'filter'    => [
                'customer'  => $userAll['PERSONAL_PHONE']
            ]
        ];
        return self::request("GET", "orders", $requestFields)['orders'];
    }

}