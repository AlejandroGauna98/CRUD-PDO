<?php
    require('C:\laragon\www\Crud-PDO\view\head/head.php');
    require_once("C:\laragon\www\Crud-PDO\controller/usernameController.php");
    $obj = new UsernameController();
    $user = $obj->show($_GET['id']);
?>

<form action="update.php" method="POST">
    <h2>Modificando registro</h2>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" name="id" id="staticEmail" value="<?php echo $user['id']?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre" id="inputPassword" value="<?php echo $user['nombre']?>">
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?php echo $user['id']?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>


<?php
    require('C:\laragon\www\Crud-PDO\view\head/footer.php');
?>