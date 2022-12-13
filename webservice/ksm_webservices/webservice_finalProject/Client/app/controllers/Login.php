<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

require_once dirname(__DIR__) . '/models/clientModel.php';
require_once dirname(__DIR__) . '/models/loginModel.php';

class Login extends Controller
{
    public function __construct()
    {
        $this->loginModel = new loginModel();
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/login');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);
            if ($user != null) {
                $hashed_pass = $user->pass_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_pass)) {
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/">';
                    $this->createSession($user);
                    $data = [
                        'msg' => "Welcome, $user->name!",
                    ];
                    $this->view('Home/home', $data);

                    // LOGGING
                    // Create the logger
                    $logger = new Logger('my_logger');
                    // Now add some handlers
                    $logger->pushHandler(new StreamHandler(dirname(dirname(__FILE__)) . '/logs/logging.log', Level::Debug));
                    $logger->pushHandler(new FirePHPHandler());

                    // You can now use your logger
                    $logger->info($user->name . ' logged in successfully');
                } else {
                    $this->view('Login/login');
                    echo ('<div class="alert alert-danger text-center" role="alert">');
                    echo 'Password incorrect for ' . $user->name . ' !';
                    echo ('</div>');
                }
            } else {
                $this->view('Login/login');
                echo ('<div class="alert alert-danger text-center" role="alert">');
                echo 'User does not exist !';
                echo ('</div>');
            }
        }
    }
    /*
     * Creates user session variables
     */
    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['api_key'] = $user->api_key;
        $_SESSION['user_username'] = $user->name;
    }

    /*
     * Signs out a user
     */
    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/home');
    }
}
