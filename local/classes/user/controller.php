<?php
namespace user;

abstract class controller 
{

    const URL = "https://rakamakafit.retailcrm.ru/api/v5/";
    const TOKEN = "AGfyMWqN7QRdjd3MI1z8CxgIPNsi8eSs";

    public static function request($method, $url, $data = []) {
        $data['apiKey'] = self::TOKEN;
       
        $jsonData = http_build_query($data);
        if ($method == 'GET')
            $url .= '?'.$jsonData;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => self::URL.$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => $jsonData,
        CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            die;
        } else {
            return json_decode($response,true);
        }
    }
}