<?php
    require('C:\laragon\www\Crud-PDO\view\head/head.php');
    require_once("C:\laragon\www\Crud-PDO\controller/usernameController.php");
    $obj = new UsernameController();
   // $rows = $obj->index();
?>
<div class="mb3">
    <a href="create.php" class="btn btn-primary">Agregar nuevo usuario</a>
</div>
<table class="table" id="datatable_usuarios">
    <thead>
        <tr>
            <th class="scope">ID</th>
            <th class="scope">Nombre</th>
            <th class="scope">Estado</th>
            <th class="scope">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<?php
    require('C:\laragon\www\Crud-PDO\view\head/footer.php');
?>

<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalEliminarLabel">Desea eliminar el registro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podra recuperar el registro
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-danger btnEliminar">Eliminar</button>
                                       <!-- <a href="delete.php?id=<?php echo $row[0] ?>"  class="btn btn-danger">Eliminar</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>