<?php

function rakamakafitAutoloader($className)
{


    $dr = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;

    $className = ltrim($className, '\\');
    $classDir  = $dr . '/local/classes';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\'))
    {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', $ds, $namespace) . $ds . $className;
    }

    $fileName = $classDir . $ds . $fileName . '.php';
    if (file_exists($fileName)) require $fileName;
}
