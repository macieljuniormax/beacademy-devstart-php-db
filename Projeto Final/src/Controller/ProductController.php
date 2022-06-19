<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;

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
      $newPrice = $_POST['price'];
      $newPhoto = $_POST['photo'];
      $NewQuantity = $_POST['quantity'];


      $query = "UPDATE tb_product 
                set name = '{$newName}',
                description = '{$newDescription}',
                valor = '{$newPrice}',
                photo = '{$newPhoto}',
                quantity = '{$NewQuantity}'
                WHERE id = '{$id}'";

      $result = $connection->prepare($query);
      $result->execute();
      echo "Produto Atualizado!";
    }

    $query = "SELECT * FROM tb_product WHERE id = '{$id}'";
    $result = $connection->prepare($query);
    $result->execute();

    // $queryCategories = "SELECT * FROM tb_category";
    // $categories = $connection->prepare($queryCategories);
    // $categories->execute();
    $data = $result->fetch(\PDO::FETCH_ASSOC);
    // $dataCategories = $categories->fetch(\PDO::FETCH_ASSOC);
    parent::render('product/edit', $data);
  }

  public function reportAction(): void
  {
    $connection = Connection::getConnection();
    $result = $connection->prepare('SELECT
                                        prod.id,
                                        prod.name,
                                        prod.quantity,
                                        cat.name AS category
                                    FROM
                                        tb_product prod
                                        INNER JOIN tb_category cat ON prod.categoria_id = cat.id');
    $result->execute();

    $content = '';
    while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
      extract($product);

      $content .= "<tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$quantity}</td>  
                    <td>{$category}</td>
                  </tr>";
    }

    $html = "<h1>Relatórios</h1>
            <table border='1' width='100%'>
              <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                  </tr>
              </thead>
              <tbody>
                {$content}
              </tbody>
            </table>";

    $pdf = new Dompdf();
    $pdf->loadHtml($html);

    $pdf->render();
    $pdf->stream();
  }
}
