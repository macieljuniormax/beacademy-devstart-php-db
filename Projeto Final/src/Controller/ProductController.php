<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;

class ProductController extends AbstractController
{
  public function listAction(): void
  {
    $connection = Connection::getConnection();
    $result = $connection->prepare('SELECT * FROM tb_product');
    $result->execute();
    parent::render('product/list', $result);
  }
  public function addAction(): void
  {
    $connection = Connection::getConnection();

    if ($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $valor = $_POST['value'];
      $photo = $_POST['photo'];
      $quantity = $_POST['quantity'];
      $categoria_id = $_POST['category'];
      $created_at = date('Y-m-d H:i:s');

      $query = "INSERT INTO tb_product 
                (name, description, valor, photo, quantity, categoria_id, created_at)
                VALUES('{$name}', '{$description}', '{$valor}', '{$photo}', '{$quantity}', '{$categoria_id}', '{$created_at}');";
      $result = $connection->prepare($query);
      $result->execute();

      echo 'Produto Adicionado!';
    }

    $result = $connection->prepare('SELECT * FROM tb_category');
    $result->execute();
    parent::render('product/add', $result);
  }

  public function removeAction(): void
  {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_product WHERE id = '{$id}'";
    $connection = Connection::getConnection();
    $result = $connection->prepare($query);
    $result->execute();
    $message = "Produto excluído!";
    parent::renderMessage($message);
  }

  public function updateAction(): void
  {
    $id = $_GET['id'];
    $connection = Connection::getConnection();

    if ($_POST) {
      $newName = $_POST['name'];
      $newDescription = $_POST['description'];
      $queryUpdate = "UPDATE tb_product SET name='{$newName}', description='{$newDescription}' WHERE id = '{$id}'";
      $result = $connection->prepare($queryUpdate);
      $result->execute();
      echo 'Produto Atualizado!';
    }

    $query = "SELECT * FROM tb_product WHERE id = '{$id}'";
    $result = $connection->prepare($query);
    $result->execute();

    $queryCategories = "SELECT * FROM tb_category";
    $categories = $connection->prepare($queryCategories);
    $categories->execute();
    $data = $result->fetch(\PDO::FETCH_ASSOC);
    $dataCategories = $categories->fetch(\PDO::FETCH_ASSOC);
    parent::render('product/edit',  $dataCategories, $data);
  }
}
