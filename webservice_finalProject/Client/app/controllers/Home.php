<?php

// require_once dirname(dirname(__FILE__)).'/core/Controller.php';
require_once dirname(__DIR__).'/models/clientModel.php';

    class Home extends Controller{

        public function index(){
            
            $this->view('home');
        }

        public function __construct(){

            // parent::__construct();
            // $this->controller = new Controller();
            $this->model = new clientModel();
            // $this->model = $this->controller->model('model');
        }
        // public function index(){
        //     $this->controller->view('signup');
        // }
        public function createUser(){
            if(!isset($_POST['signup'])){
                echo "apparently signup wasn't pressed";
            }else{
                $data=[
                    'username' => trim($_POST['username']),
                    'phone' => trim($_POST['contact_no']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['user_password'])
                ];
                if($this->model->createUser($data) == true){
                    echo "User created";
                }
            }
        }
    }
?>