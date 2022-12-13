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
                    'api_key' => bin2hex(random_bytes(32))
                ];
                if ($this->model->createUser($data)) {
                    $ch = curl_init();
                    $url = "http://localhost/webservice/ksm_webservices/webservice_finalProject/webservice/api/User/";
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Accept: application/json'
                    ));

                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "username=" . $data['username'] . "&apikey=" . $data['api_key']);
                    $results = curl_exec($ch);
                    curl_close($ch);
                    echo ('<div class="alert alert-dark text-center" role="alert">');
                    echo 'Please wait creating the account for ' . trim($_POST['username']);
                    echo ('</div>');
                    echo '<meta http-equiv="Refresh" content="2; url=http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/Login">';
                }
            } else {
                echo ('<div class="alert alert-dark text-center" role="alert">');
                echo 'User ' . $_POST['username'] . ' already exists';
                echo ('</div>');
                $this->controller->view('Signup/signup');
            }
        }
    }
}
