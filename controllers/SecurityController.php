<?php

require '../core/PublicController.php';
require '../models/SecurityManager.php';

class SecurityController extends PublicController
{
    private SecurityManager $securityManager;

    public function __construct()
    {
        session_start();
        $this->securityManager = new SecurityManager();
    }

    public function login(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];

                if ($this->securityManager->adminConnect($login, $password)) {
                    header("Location: ?controller=home&action=index");
                    exit();
                } else {
                    echo "Login ou mot de passe incorrecte";
                    $this->render('login/login.html.php');
                }
            }
        } else {
            $this->render('login/login.html.php');
        }
    }

    public function logout()
    {
        $this->securityManager->logout();
        header("Location: ?controller=security&action=login");
        exit();
    }
}


