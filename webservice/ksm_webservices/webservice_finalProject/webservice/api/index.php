<?php

require(dirname(__DIR__)."\\core\\http\\requestbuilder.php");
require(dirname(__DIR__)."/core/http/responsebuilder.php");
require_once(dirname(__DIR__)."/core/http/request.php");
require_once(dirname(__DIR__)."/core/http/response.php");
require 'C:\Users\sarah\vendor\autoload.php';
spl_autoload_register('auto_loader');

    function auto_loader($class){
        if(file_exists(dirname(__DIR__)."/controllers/".$class.".php"))
            require(dirname(__DIR__)."/controllers/".$class.".php");
    }

    class API{
        public $requst;
        public $response;
        public $controller;

        function __construct(){

        }

        function processRequest(){
            $requestBuilder = new RequestBuilder();
            $this->request = $requestBuilder->getRequest();
            $controllername = ucfirst($this->request->urlparams["resource"])."Controller";
            if(class_exists($controllername)){ // class_exists will call the spl_autoload_register
                $this->controller = new $controllername();
            }else{
                echo "Controller Not Found";
            }

            switch($this->request->method){
                case 'GET':
                    $this->processGETResponse();
                    break;
                case 'POST':
                    $this->processPOSTResponse();
                    break;
                case 'PUT':
                    $this->processPUTResponse();
                    break;
                case 'DELETE':
                    break;
                case 'HEAD':
                    break;
                case 'OPTIONS':
                    break;
            }
        }

        function processPUTResponse(){
            if ($this->request->urlparams["resource"] == "User"){
                $payload_stuff = $this->request->payload;
                $data = [
                    'user' => $payload_stuff['user'],
                    'api' => $payload_stuff['api']
                ];
                $rawpayload = $this->controller->updateUsername($data);
                if ($rawpayload){
                    $rawpayload = array('message' => "Successfully modified");
                    $payload = json_encode($rawpayload);
                    $statuscode = '204';
                    $statustext = 'No Content';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }else{
                    $rawpayload = array('message' => "Not able to modify, maybe entered something wrong");
                    $payload = json_encode($rawpayload);
                    $statuscode = '400';
                    $statustext = 'Bad Request';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }
            }
        }
        function processPOSTResponse(){
            if ($this->request->urlparams["resource"] == "User"){
                //adding user to server db
                $payload_stuff = $this->request->payload;
                $data = [
                    'username' => $payload_stuff['username'],
                    'api_key' => $payload_stuff['apikey']
                ];
                $rawpayload = $this->controller->addUser($data);
                if($rawpayload != 0){
                    $strpayload = json_encode($rawpayload);
                    $payload = $strpayload;
                    $statuscode = '301';
                    $statustext = 'Created';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }else{
                    $payload = "Bad Request, potentially didn't enter correct information";
                    $statuscode = '400';
                    $statustext = 'Bad Request';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }
            }elseif($this->request->urlparams["resource"] == "Conversion"){
                // FIRST DOWNLOAD THE FILE:
                //krikor this was code i did before i realized you were going to do this part
                //if you wanna keep it that's chill if not delete it lol
                /*$payload_stuff = $this->request->payload;
                $key = $payload_stuff['api_key'];
                $idClient = $this->controller->getClientIdBasedOnApiKey($key);
                $id = $idClient[0]["id"];
                $data = [
                    'client_id' => $id,
                    'og_language' => $payload_stuff['original_language'],
                    'trans_language' => $payload_stuff['target_language'],
                    'input_file' => $payload_stuff['input_file'],
                    'output_file' => $payload_stuff['output_file']
                ];
                $rawpayload = $this->controller->addConversion($data);
                if($rawpayload != 0){
                    $strpayload = json_encode($rawpayload);
                    $payload = $strpayload;
                    $statuscode = '301';
                    $statustext = 'Created';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }else{
                    $payload = "Bad Request, potentially didn't enter correct information";
                    $statuscode = '400';
                    $statustext = 'Bad Request';
                    $contenttype = 'application/json';
                    $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
                    $responseBuilder  = new Responsebuilder($headerfields, $payload);
                    $this->response = $responseBuilder->getResponse();
                }*/
            } 
        }

        function processGETResponse(){
            
            $apikey = $this->request->urlparams['api_key'];
            // $clientID = $this->request->urlparams['id'];
            $header = array();
            $payload = array();
            $statuscode = 0;
            $statustext = "";
            $contenttype = "";
            
            $rawpayload = $this->controller->getHistory($apikey);

            if(count($rawpayload) > 0){
                $statuscode = 200;
                $statustext = "OK";
            }else{
                $statuscode = 404;
                $statustext = "Not Found";
                $rawpayload = array('message' => "No data found, possibly invalid enpoint.");
            }

            
            switch($this->request->header['Accept']){
                case 'application/json':
                    $payload = json_encode($rawpayload);
                    $contenttype = 'application/json';
                    break;
                case 'application/xml':
                    break;
                default:
                    $payload = json_encode($rawpayload);
                    $contenttype = 'application/json';                               
            }

            $headerfields = ['Status-Code'=> $statuscode, 'Status-Text' => $statustext, 'Content-Type' => $contenttype ];
            $responseBuilder  = new Responsebuilder($headerfields, $payload);
            $this->response = $responseBuilder->getResponse();
        }

        public function downloadFile($fileName){
            try {
                $s3 = new Aws\S3\S3Client([
                    'region'  => 'us-east-1',
                    'version' => 'latest',
                    'credentials' => [
                        'key'    => "AKIAUTZKO3SNYPVE6ILQ",
                        'secret' => "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",
                    ]
                ]);
                $key = $fileName;
                $result = $s3->getObject([
                    'Bucket' => 'cnkbucket',
                    'Key'    => $key
                ]);
            
                // Display the object in the browser.
                header("Content-Type: {$result['ContentType']}");
                header('Content-Disposition: filename="' . basename($key) . '"');
                echo $result['Body'];
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
              }
        }
    }

    $api = new API();

    $api->processRequest();

    echo( $api->response->payload);
    
    ?>