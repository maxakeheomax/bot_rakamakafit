<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

mail("hello@rakamakafit.ru", "Станица подделки на сайте", "
Пользователь: ". $_POST['email']."\n
Пишет: ".$_POST['fake-detection-form-textarea']);

header("Location: /about/");

die;