<?php

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL

$soap = new SoapClient('http://'.$_SERVER['SERVER_NAME'].'/service.php?wsdl',['trace' => 1, 'encoding' => 'utf-8']);

try
{
    var_dump($soap->getName());
    var_dump($soap->getId());

    $soap->setName('asd');
    var_dump($soap->getName());
    $soap->setName('qwe');
    var_dump($soap->getName());

}catch (Exception $e)
{
    var_dump($e->getMessage());
    var_dump($soap->__getLastRequest());
    var_dump($soap->__getLastResponse());
    var_dump($soap->__getFunctions());
}
