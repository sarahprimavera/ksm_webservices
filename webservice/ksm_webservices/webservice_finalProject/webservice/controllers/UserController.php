<?php

require(dirname(__DIR__)."/models/TextConversion.php");

class UserController{
    private $textconversion;

    function __construct(){
        $this->textconversion = new TextConversion();
    }

    function addUser($data){
        return $this->textconversion->addClient($data);
    }

    function updateUsername($data){
        return $this->textconversion->updateUser($data);
    }
}
?>