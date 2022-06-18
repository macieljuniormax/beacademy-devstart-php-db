<hr>
<div class="d-flex justify-content-between align-items-center">
  <h1>Listar Produtos</h1>

  <div class="mb-3 text-end">
    <a href="/produtos/novo" class="btn btn-outline-primary">Novo Produto</a>
  </div>
</div>

<table class="table table-hover table-striped align-middle;">
  <thead class="table-dark">
    <tr>
      <th>#ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Imagem</th>
      <th>Preço</th>
      <th>Quantidade</th>
      <th>Data de cadastro</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($product = $data->fetch(\PDO::FETCH_ASSOC)) {
      extract($product);
      echo '<tr>';
      echo "<td class='align-middle'>{$id}</td>";
      echo "<td class='align-middle'>{$name}</td>";
      echo "<td style='max-width: 300px;' class='align-middle'>{$description}</td>";
      echo "<td class='align-middle'><img style='width: 100px;' src='{$photo}' alt='{$name}'></td>";
      echo "<td class='align-middle'>{$valor}</td>";
      echo "<td class='align-middle'>{$quantity}</td>";
      echo "<td class='align-middle'>{$created_at}</td>";
      echo "<td class='align-middle text-center'>
              <a href='/produtos/editar?id={$id}' class='btn-warning btn btn-sm'>Editar</a>
              <a href='/produtos/excluir?id={$id}' class='btn-danger btn btn-sm'>Excluir</a>
            </td>";
      echo '</tr>';
    }
    ?>
  </tbody>
</table>