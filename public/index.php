<?php

// On inclut dynamiquement le fichier de contrôleur

if (!empty($_GET['controller'])) {

    $controllerName = $_GET['controller'];
} else {
    $controllerName = 'home';
}

$controllerClassName = ucfirst($controllerName) . 'Controller';

if (file_exists('../controllers/' . $controllerClassName . '.php')) {

    require '../controllers/' . $controllerClassName . '.php';

    // on instancie le contrôleur 
    $controller = new $controllerClassName(); // new HomeController() par défaut

    if (!empty($_GET['action'])) {

        $action = $_GET['action'];
    } else {

        $action = 'index'; // Action par défault du contrôleur
    }
    if (method_exists($controller, $action)) {

        $controller->$action(); // Index par défaut

    } else {

        require '../controllers/ErrorController.php';
        $controller = new ErrorController();
        $controller->notFound(); // Action 404
    }
} else {

    require '../controllers/ErrorController.php';
    $controller = new ErrorController();
    $controller->notFound(); // Action 404

}
