<?php

// require_once dirname(dirname(__FILE__)).'/core/Controller.php';
require_once dirname(__DIR__).'/models/clientModel.php';

    class History extends Controller{

        public function index(){
            
            $ch = curl_init();
            $url = "http://localhost/FinalProject/ksm_webservices/webservice_finalProject/webservice/api/conversion/api123";
           curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json'
            ));   
           
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $data = json_decode($result);
            curl_close($ch);
            
            $this->view('history/history', $data);
        }

        public function __construct(){

            // parent::__construct();
            // $this->controller = new Controller();
            $this->model = new clientModel();
            // $this->model = $this->controller->model('model');
        }
        
        
    }
?>