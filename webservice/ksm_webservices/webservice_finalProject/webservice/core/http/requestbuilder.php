<?php
    
    require("request.php");

    class RequestBuilder{

        private $Request;

        function __construct()
        {
            $method = $_SERVER["REQUEST_METHOD"];
            $urlparams = $_GET;
            $header =  getallheaders();
            parse_str(file_get_contents("php://input"), $payload);

            $this->Request = new Request($method, $urlparams, $header, $payload);
            
        }

        public function getRequest(){
            return $this->Request;
        }

    }

?>