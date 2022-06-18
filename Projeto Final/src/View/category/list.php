<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<h1>Listar Categorias</h1>

<table class="table table-hover table-striped align-middle;">
  <thead class="table-dark">
    <tr>
      <th>#ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
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
      echo "<td class='align-middle'><a href='/categorias/excluir?id={$id}' class='btn-danger btn btn-sm'>Excluir</a></td>";
      echo '</tr>';
    }
    ?>
  </tbody>
</table>