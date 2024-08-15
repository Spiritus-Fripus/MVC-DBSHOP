<?php

require '../core/Controller.php';

abstract class PrivateController extends Controller
{

    public function __construct()
    {
        session_start();

        if (empty($_SESSION['user_connected']) || $_SESSION['user_connected'] !== 'ok') {
            header('Location: /?controller=security&action=login');
            exit();
        }

    }
}
