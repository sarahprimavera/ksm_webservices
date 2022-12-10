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

    function getIdBasedOnApiKey($apikey){
        $query = 'SELECT id FROM clients WHERE api_key = :api_key';
        
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':api_key', $apikey, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function addClient($data){
        $query = 'INSERT INTO clients (name, license_number, licenses_startdate, license_enddate, api_key) VALUES 
                                      (:name, :license_number, :licenses_startdate, :license_enddate, :api_key)';
        $license_num = $this->generateLicenseNum();
        $license_start = date("Y-m-d");
        $str_license_start = strval($license_start);
        $license_end = date('Y-m-d', strtotime($license_start. ' + 1 years'));
        $str_license_end = strval($license_start);

        $statement = $this->conn->prepare($query);
        $statement->bindParam(':name', $data['username'], PDO::PARAM_STR);
        $statement->bindParam(':license_number', $license_num, PDO::PARAM_STR);
        $statement->bindParam(':licenses_startdate', $str_license_start, PDO::PARAM_STR);
        $statement->bindParam(':license_enddate', $str_license_end, PDO::PARAM_STR);
        $statement->bindParam(':api_key', $data['api_key'], PDO::PARAM_STR);
        $isGood = $statement->execute();
        $return_data = [
            'name' => $data['username'],
            'license_number' => $license_num,
            'licenses_startdate' => strval($license_start),
            'license_enddate' => strval($license_end),
            'api_key' => $data['api_key']
        ];
        if($isGood){
            return $return_data;
        }else{
            return 0;
        }
    }

    function addConversion($data){
        $query = 'INSERT INTO `conversions` (client_id, request_date, completion_date, original_language, translated_language, input_file, output_file) 
                                     VALUES (:client_id, :request_date, :completion_date, :original_language, :translated_language, :input_file, :output_file)';
        $date = date("Y-m-d");

        $statement = $this->conn->prepare($query);
        $statement->bindParam(':client_id', $data['client_id'], PDO::PARAM_STR);
        $statement->bindParam(':request_date', $date, PDO::PARAM_STR);
        $statement->bindParam(':completion_date', $date, PDO::PARAM_STR);
        $statement->bindParam(':original_language', $data['og_language'], PDO::PARAM_STR);
        $statement->bindParam(':translated_language', $data['trans_language'], PDO::PARAM_STR);
        $statement->bindParam(':input_file', $data['input_file'], PDO::PARAM_STR);
        $statement->bindParam(':output_file', $data['output_file'], PDO::PARAM_STR);
        $isGood = $statement->execute();

        $dataToReturn = [
            'client_id' => $data['client_id'],
            'request_date' => $date,
            'completion_date' => $date,
            'original_language' => $data['og_language'],
            'translated_language' => $data['trans_language'],
            'input_file' => $data['input_file'],
            'output_file' => $data['output_file']
        ];
        if($isGood){
            return $dataToReturn;
        }else{
            return 0;
        }
    }

    function generateLicenseNum(){
        $tokens = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $license_string = '';
        for ($i = 0; $i < 4; $i++) {
            $segment = '';
            for ($j = 0; $j < 4; $j++) {
                $segment .= $tokens[rand(0, strlen($tokens)-1)];
            }
            $license_string .= $segment;
            if ($i < (4 - 1)) {
                $license_string .= '-';
            }
        }

        return $license_string;
    }

}

?>