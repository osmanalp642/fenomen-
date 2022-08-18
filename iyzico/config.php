<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-z4xIneTrcTSgwYb99flxU0w30g34SAuX");
        $options->setSecretKey("sandbox-Z5tT0akf2TRebWkE8WHn0lbnBI98orO4");
        $options->setBaseUrl("https://api.iyzipay.com");
        return $options;
    }
}