<?php
include_once 'app/controllers/prod.controller.php';
include_once 'app/controllers/auth.controller.php';
include_once 'app/controllers/admin.controller.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define("URL_LOGIN", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/login');
define("URL_USER", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/admin');
define("URL_LOGOUT", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/logout');
// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case "home":
        $controller = new prodController;
        $controller->showHome();
        break;
    case "procesarBtn":
        $controller = new prodController;
        $controller->procesarBtn();
        break;
    case "productRelate":
        $controller = new prodController;
        $controller->productRelate($params[1]);
        break;
    case "productDetails":
        $controller = new prodController;
        $controller->productDetails($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new  AuthHelper();
        $controller->logout();
        break;
    case 'admin':
        $controller = new adminController();
        $controller->admin();
        break;
    case 'listItems':
        $controller = new adminController();
        $controller->getItems();
        break;
    case 'delete':
        $controller = new adminController();
        $controller->deleteItems($params[1]);
        break;
    case 'update':
        $controller = new adminController();
        $controller->updatePrices($params[1]);
        break;
    case 'showInsertItems':
        $controller = new adminController();
        $controller->insertItems();
        break;
    case 'insertProducts':
        $controller = new adminController();
        $controller->insertProducts();
        break;
    default:
        echo ('404 Page not found');
        break;
}
