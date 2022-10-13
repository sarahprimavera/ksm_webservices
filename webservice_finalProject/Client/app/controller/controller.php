<?php

    class controller extends Controller{

        public function __construct(){

            // parent::__construct();
            $this->model = $this->model('model');
        }
        public function index(){
            if(isset($_POST['signup'])){
                controller::createUser();
            }
        }
        public function createUser(){
            $data=[
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['user_password']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone'])
                ];
            $this->model->createUser($data);
        }
    }
?>