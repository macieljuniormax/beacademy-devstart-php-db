<?php

use App\Controller\CategoryController;
use App\Controller\IndexController;
use App\Controller\ProductController;

function createRoutes(string $controllerName, string $methodName)
{
  return ['controller' => $controllerName, 'method' => $methodName];
}

$routes = [
  '/' => createRoutes(IndexController::class, 'indexAction'),

  '/produtos' => createRoutes(ProductController::class, 'listAction'),
  '/produtos/novo' => createRoutes(ProductController::class, 'addAction'),
  '/produtos/excluir' => createRoutes(ProductController::class, 'removeAction'),
  '/produtos/editar' => createRoutes(ProductController::class, 'updateAction'),
  '/produtos/relatorio' => createRoutes(ProductController::class, 'reportAction'),

  '/categorias' => createRoutes(CategoryController::class, 'listAction'),
  '/categorias/nova' => createRoutes(CategoryController::class, 'addAction'),
  '/categorias/excluir' => createRoutes(CategoryController::class, 'removeAction'),
  '/categorias/editar' => createRoutes(CategoryController::class, 'updateAction')
];

// $routes = [
//   '/' => ['controller' => IndexController::class, 'method' => 'indexAction'],
//   '/produtos' => ['controller' => ProductController::class, 'method' => 'listAction'],
// ]; Mesma funcionalidade dos dois códigos acima, porem sem a função

return $routes;
