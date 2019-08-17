<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/local/classes/autoload.php');
spl_autoload_register('rakamakafitAutoloader');
//rest
AddEventHandler("main", "OnAfterUserAdd", Array("\user\User", "add"));
