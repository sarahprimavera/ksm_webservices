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

    // SINCE EACH CLIENT HAS ITS UNIQUE API KEY, WE CAN USE THE API KEY TO GET THE HISTORY
    function getHistory($apikey){
        $query = 'SELECT * FROM conversions
                WHERE client_id = 
                (SELECT id 
                             FROM clients
                             WHERE api_key = :apikey)';
        
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':apikey', $apikey, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

}

?>