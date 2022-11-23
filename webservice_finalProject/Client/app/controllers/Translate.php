<?php

// require_once dirname(dirname(__FILE__)).'/core/Controller.php';
require_once dirname(__DIR__).'/models/clientModel.php';

    class Translate extends Controller{

        public function index(){
            
            $this->view('home');
        }

        public function __construct(){

            
            $this->model = new clientModel();
            
        }

        public function getInput(){
            if(!isset($_POST['translate'])){
                $this->view('Home');
             }
             else{
                 $data = [
                     'original_language' => $_POST['original_language'],
                     'target_language' => $_POST['target_language']
                     
                 ];
                 
                 var_dump($data);
             }
        }
        
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