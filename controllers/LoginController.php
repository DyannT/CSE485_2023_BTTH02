<?php
require("services/AdminService.php");
class LoginController
{
    public function index()
    {
        include("view/home/login.php");
    }
    public function login()
    {
        $userService = new AdminService();
        $username = $_POST['txtUser'];
        $password = $_POST['txtPassword'];
        $user = $userService->login($username, $password);

        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: index.php?controller=admin');
            exit;
        } else {
            header("Location: index.php?controller=login&error='Invalid user or pass'");
            exit;
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?controller=login');
        exit;
    }
}
