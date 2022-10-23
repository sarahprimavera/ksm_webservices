<?php

require(dirname(__DIR__)."\\core\\http\\requestbuilder.php");
require(dirname(__DIR__)."/core/http/responsebuilder.php");
require_once(dirname(__DIR__)."/core/http/request.php");
require_once(dirname(__DIR__)."/core/http/response.php");
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
            var_dump($controllername);
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
                    break;
                case 'DELETE':
                    break;
                case 'HEAD':
                    break;
                case 'OPTIONS':
                    break;
            }
        }

        function processPOSTResponse(){
            // TO BE IMPLEMENTED
        }

        function processGETResponse(){
            $apikey = $this->request->urlparams['apikey'];
            $clientID = $this->request->urlparams['id'];
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
    }

    $api = new API();

    $api->processRequest();

    echo( $api->response->payload);
    
    ?>