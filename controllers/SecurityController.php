<?php

require '../core/Controller.php';


class SecurityController extends Controller
{
    public function login()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $_SESSION['user_connected'] = 'ok';
            header('location : ../public/index.html.php');
            exit();
        }

        $this->render('security/login.html.php');
    }
}
