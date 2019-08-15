<?php

namespace user;

class User extends controller {

    //create customer
    public static function add(&$arFields) {
        if (!$arFields['RESULT_MESSAGE']) {
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
        }
        // print_r($arFields);die;
    }

}