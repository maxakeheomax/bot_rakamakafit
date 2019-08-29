<?php

// getAllOrders
global $USER;
$finishedStatuses = [
    'delivered',
];
$orders = \user\User::getFinishOrders($USER->GetID());
$finished = [];
$inProgress = [];
foreach($orders as $order) {
    if (in_array($order['status'], $finishedStatuses)) {
        $finished[] = $order;
    } else {
        $inProgress[] = $order;
    }
}
$arResult['finished'] = $finished;
$arResult['inProgress'] = $inProgress;