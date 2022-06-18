<hr>
<div class="d-flex justify-content-between align-items-center">
  <h1>Listar Categorias</h1>

  <div class="mb-3 text-end">
    <a href="/categorias/nova" class="btn btn-outline-primary">Nova Categoria</a>
  </div>
</div>

<table class="table table-hover table-striped align-middle;">
  <thead class="table-dark">
    <tr>
      <th>#ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
      extract($category);
      echo '<tr>';
      echo "<td class='align-middle'>{$id}</td>";
      echo "<td class='align-middle'>{$name}</td>";
      echo "<td class='align-middle'>{$description}</td>";
      echo "<td class='align-middle text-center'>
              <a href='/categorias/editar?id={$id}' class='btn-warning btn btn-sm'>Editar</a>
              <a href='/categorias/excluir?id={$id}' class='btn-danger btn btn-sm'>Excluir</a>
            </td>";
      echo '</tr>';
    }
    ?>
  </tbody>
</table>