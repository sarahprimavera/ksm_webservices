<?php

// require_once dirname(dirname(__FILE__)).'/core/Controller.php';
require_once dirname(__DIR__).'/models/clientModel.php';

    class Profile extends Controller{

        public function __construct(){

            // parent::__construct();
            // $this->controller = new Controller();
            $this->model = new clientModel();
            // $this->model = $this->controller->model('model');
        }

        public function index(){

            $data = $this->model->getUserByApiKey($_SESSION['api_key']);
            $this->view('profile/profile', $data);
        }
        
    }
?>