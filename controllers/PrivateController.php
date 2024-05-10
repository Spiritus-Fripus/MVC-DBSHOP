<?php

require '../core/Controller.php';

abstract class PrivateController extends Controller
{

    public function __construct()
    {
        if (empty($_SESSION['user'])) {
            header('location : /?controller=security&action=login');
            exit();
        }
    }
}
