<?php

require(dirname(__DIR__)."/models/TextConversion.php");

class ConversionController{
    private $textconversion;

    function __construct(){
        $this->textconversion = new TextConversion();
    }

    function getHistory($apikey){
        return $this->textconversion->getHistory($apikey);
    }

    function addConversion($data){
        return $this->textconversion->addConversion($data);
    }

    function getClientIdBasedOnApiKey($apikey){
        return $this->textconversion->getIdBasedOnApiKey($apikey);
    }
}
?>