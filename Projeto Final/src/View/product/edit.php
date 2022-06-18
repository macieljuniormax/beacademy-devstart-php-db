<hr>
<h1>Editar Produto</h1>
<?php extract($data) ?>

<form action="" method="post">
  <!-- <label for="category">Nome</label>
  <select id="category" name="category" class="form-select">
    <option selected> -- Selecione -- </option>
    <?php
    // while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
    //   extract($category);
    //   echo "<option value={$category['id']}> {$category['name']}</option>";
    // }
    ?>
  </select> -->


  <label for="name">Nome:</label>
  <input id="name" name="name" value="<?php echo $data['name']; ?>" type="text" class="form-control mb-3" />

  <label for="description">Descrição</label>
  <textarea id="description" name="description" type="text" class="form-control mb-3"><?php echo $data['description'] ?></textarea>

  <label for="price">Preço:</label>
  <input id="price" name="price" value="<?php echo $data['valor']; ?>" type="text" class="form-control mb-3" />

  <label for="quantity">Quantidade:</label>
  <input id="quantity" name="quantity" value="<?php echo $data['quantity']; ?>" class="form-control  mb-3">

  <label for="photo">Foto:</label>
  <input id="photo" name="photo" type="text" value="<?php echo $data['photo']; ?>" class="form-control mb-3" />

  <button class="btn btn-primary">Enviar</button>
</form>