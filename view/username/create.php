<?php
  require('C:\laragon\www\Crud-PDO\view\head/head.php');
?>

    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label  class="form-label">Nombre del usuario</label>
            <input type="text" name="nombre" required class="form-control">
           
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>

<?php
  require('C:\laragon\www\Crud-PDO\view\head/footer.php');
?>