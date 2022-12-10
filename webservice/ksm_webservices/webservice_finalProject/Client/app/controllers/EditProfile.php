<?php

require_once dirname(__DIR__) . '/models/clientModel.php';

class editProfile
{

    public function __construct()
    {

        $this->controller = new Controller();
        $this->model = new clientModel();
    }
    public function index()
    {
        if(!isset($_POST['update'])){
            $data = $this->model->getUserByApiKey($_SESSION['api_key']);
            $this->controller->view('Profile/editProfile', $data);
         }
         else{
            $data = [
                'user' => $_POST['updateUser'],
                'num' => $_POST['updateNumber'],
                'email' => $_POST['updateEmail'],
                'api' => $_SESSION['api_key']
            ];

            if($this->model->updateUser($data)){
                $data = array(
                    "user" => $_POST['updateUser'],
                    "api" => $_SESSION['api_key']
                );
                $ch = curl_init("http://localhost/webservice/ksm_webservices/webservice_finalProject/webservice/api/User/");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

                $response = curl_exec($ch);
                curl_close($ch);
                echo 'Updating';
                echo '<meta http-equiv="Refresh" content="1; url=http://localhost/webservice/ksm_webservices/webservice_finalProject/Client/">';
            }
         }
    }
    
}