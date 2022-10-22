<?php

require(dirname(__DIR__)."/core/database/dbconnectionmanager.php");

class TextConversion{

    public $id;
    public $clientid;
    public $requestdate;
    public $completiondate;
    public $originalformat;
    public $targetformat;
    public $inputfile;
    public $outputfile;

    private $conn;

    function __construct(){
        $dbconnmanager = new DBConnectionManager();
        $this->conn = $dbconnmanager->getconnection();
    }

}