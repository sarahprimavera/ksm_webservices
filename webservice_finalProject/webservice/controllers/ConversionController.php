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
}
?>