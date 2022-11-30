<?php

require_once dirname(__DIR__) . '/models/clientModel.php';

class signupController
{

    public function __construct()
    {

        $this->controller = new Controller();
        $this->model = new clientModel();
    }
    public function index()
    {
        $this->controller->view('signup/signup');
    }
    public function createUser()
    {
        if (!isset($_POST['signup'])) {
            echo "apparently signup wasn't pressed";
            $this->controller->view('Profile/profile');
        } else {
            $user = $this->model->getUser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'phone' => trim($_POST['contact_no']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];
                if ($this->model->createUser($data)) {
                    echo 'Please wait creating the account for ' . trim($_POST['username']);
                    echo '<meta http-equiv="Refresh" content="2; url=http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/Login">';
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " already exists",
                ];
                $this->controller->view('Signup/signup');
            }
        }
    }
}
