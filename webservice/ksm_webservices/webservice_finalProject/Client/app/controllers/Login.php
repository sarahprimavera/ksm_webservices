<?php
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
            echo "else";
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
                } else {
                    $data = [
                        'msg' => "Password incorrect! for $user->name",
                    ];
                    $this->view('Login/login', $data);
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " does not exists",
                ];
                $this->view('Login/login', $data);
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
        //header('Location: /MVC/Home');
    }
}
