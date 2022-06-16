<?php

include '../vendor/autoload.php';

use App\Controller\ErrorController;
use App\Controller\IndexController;
use App\Controller\ProductController;

$url = explode('?', $_SERVER['REQUEST_URI'])[0];

function createRoutes(string $controllerName, string $methodName)
{
  return ['controller' => $controllerName, 'method' => $methodName];
}

$routes = [
  '/' => createRoutes(IndexController::class, 'indexAction'),
  '/produtos' => createRoutes(ProductController::class, 'listAction'),
  '/produtos/novo' => createRoutes(ProductController::class, 'addAction'),
];


// $routes = [
//   '/' => ['controller' => IndexController::class, 'method' => 'indexAction'],
//   '/produtos' => ['controller' => ProductController::class, 'method' => 'listAction'],
// ]; Mesma funcionalidade dos dois códigos acima, porem sem a função

if (false === isset($routes[$url])) {
  (new ErrorController())->notFoundAction();
  exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];
(new $controllerName())->$methodName();
