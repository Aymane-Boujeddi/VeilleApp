<?php
require_once(__DIR__ . '/../models/User.php');
class AuthController extends BaseController
{

    private $UserModel;
    public function __construct()
    {

        $this->UserModel = new User();
    }

    public function showRegister()
    {
        $this->render('auth/register');
    }
    public function showLogin()
    {

        $this->render('auth/login');
    }

    public function handleRegister()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['signup'])) {
                // echo "<pre>";
                //   var_dump($_POST);die();

                $name = $_POST['full_name'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $password = $_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // $user = [$full_name, $hashed_password, $email, $role];



              
                $this->UserModel->register($name,$email,$hashed_password,$role);
                header("location: ./login");
                exit;

                // $_SESSION['userID'] = $lastInsertId;
                // $_SESSION['user_role'] = $role;

                // if ($lastInsertId && $role == 1) {
                //     header('Location: /admin/dashboard');
                // } else if ($lastInsertId && $role == 2) {
                //     header('Location: /client/dashboard');
                // } else if ($lastInsertId && $role == 3) {
                //     header('Location: /freelancer/dashboard');
                // }

                // exit;
            }
        }
    }
    public function handleLogin()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userData = [$email, $password];
                $user = $this->UserModel->login($userData);
                $role = $user['user_role'];
                // var_dump($user);die();
                $_SESSION['userID'] = $user["userID"];
                $_SESSION['user_role'] = $role;
                $_SESSION['username'] = $user['username'];

                if ($user && $role == 'student') {
                    header("location: student/dashboard");
                } else if ($user && $role == 'teacher') {
                    header('Location: teacher/dashboard');
                }
            }
        }
    }

    public function logout()
    {


        // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
        //  var_dump($_SESSION);die();
        if (isset($_SESSION['userID']) && isset($_SESSION['user_role'])) {
            unset($_SESSION['userID']);
            unset($_SESSION['user_role']);
            session_destroy();

            header("Location: home");
            exit;
        }
        //   }
    }
}
