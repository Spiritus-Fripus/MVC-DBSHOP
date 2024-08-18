<?php

require '../core/PublicController.php';

abstract class PrivateController extends PublicController
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
