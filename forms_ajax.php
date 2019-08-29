<?php
use Bitrix\Sale\Internals\Input\Location;
/**
 * post:
 * [url] - return url - if none — no redirect
 * [email] 
 * [name]
 * [action]
 */

switch ($_POST['action']) {
    case 'popup':
        $listid = "aa467b2639";
        break;
    case 'exercises':
        $listid = "cc31ab26c3";
        break;
    case 'news':
        $listid = "ae4de7eb27";
        break;
    default:
        $listid = 0;
 }

$authToken = 'b7defe7458db033e6be7c0f1455433c8-us16';
// The data to send to the API
$postData = array(
    "email_address" => $_POST['email'], 
    "status" => "subscribed",
);

if (isset($_POST['name']))
    $postData['merge_fields']['NAME'] = $_POST['name'];

if ($listid) {
// Setup cURL
    $ch = curl_init('https://us16.api.mailchimp.com/3.0/lists/'.$listid.'/members/');
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization: apikey '.$authToken,
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    // Send the request
    $response = curl_exec($ch);
    curl_close($ch);
}
if (isset($_POST['url']))
    header("Location: ".$_POST['url']);