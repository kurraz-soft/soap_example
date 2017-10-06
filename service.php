<?php

require_once (__DIR__ . '/vendor/autoload.php');
require_once (__DIR__ . '/MyClass.php');

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL

if(isset($_GET['wsdl']))
{
    $wsdl = new \WSDL\WSDLCreator(MyClass::class,'http://'.$_SERVER['SERVER_NAME'].'/service.php');
    $wsdl->setNamespace('http://'.$_SERVER['SERVER_NAME'].'/');
    $wsdl->renderWSDL();
}else
{
    $soap = new SoapServer('http://'.$_SERVER['SERVER_NAME'].'/service.php?wsdl');
    $soap->setClass(MyClass::class);
    $soap->handle();
}
