<?php


use App\Controllers\LoginController;
use App\Controllers\HomeController;

$URL = $_SERVER['REQUEST_URI'];

$URL = explode('/', $URL);
$URL = array_filter($URL);
$URL = array_values($URL);
$_SESSION['id_user'] = 1;

$routes = [
  'home' => 'home',
  'login' => 'login',
  '404' => '404',
  'users' => [
    'index',
    'create',
    'store',
    'edit',
    'update',
    'destroy',
    'show'
  ]
];

$loginController = new LoginController();

if ($loginController->isLogged()) {
  if (count($URL) == 0) {
    $homeController = new HomeController();
    $homeController->index();
  } else {
    if (array_key_exists($URL[0], $routes)) {
      if (count($URL) > 1) {
        $controllerRoutes = $routes[$URL[0]];
        $controller = $URL[0];
        if (in_array($URL[1], $controllerRoutes)) {
          $method = $URL[1];
          $params = isset($URL[2]) ? $URL[2] : NULL;
        } else {
          $controller = new HomeController();
          $controller->error404();
          return;
        }
        $method = isset($URL[1]) ? $URL[1] : NULL;
        $params = isset($URL[2]) ? $URL[2] : NULL;
      } else {
        $controller = $URL[0];
        $method = 'index';
        $params = NULL;
      }
      $controller = rtrim($controller, 's');
      $controller = ucfirst($controller) . 'Controller';
      $controller = "App\\Controllers\\{$controller}";
      $controller = new $controller();
      $controller->$method($params);
      return;
    } else {
      $controller = new HomeController();
      $controller->error404();
      return;
    }
  }
} else {
  $loginController->showLoginForm();
}
