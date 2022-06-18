<hr>
<h1>Editar Produto</h1>
<?php var_dump($dataCategories) ?>

<form action="" method="post">
  <label for="category">Nome</label>
  <select id="category" name="category" class="form-select">
    <option selected> -- Selecione -- </option>
    <?php
    while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
      extract($category);
      echo "<option value={$category['id']}> {$category['name']}</option>";
    }
    ?>
  </select>

  <label for="name">Nome</label>
  <input value="<php? echo $product['name'] ?>" id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea id="description" name="description" type="text" class="form-control mb-3"></textarea>

  <label for="value">Preço</label>
  <input id="value" name="value" type="text" class="form-control mb-3">

  <label for="quantity">Quantidade</label>
  <input id="quantity" name="quantity" type="text" class="form-control mb-3">

  <label for="photo">Foto</label>
  <input id="photo" name="photo" type="text" class="form-control mb-3">

  <button class="btn btn-primary">Atualizar</button>
</form>