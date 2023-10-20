<?php
    require('C:\laragon\www\Crud-PDO\view\head/head.php');
    require_once("C:\laragon\www\Crud-PDO\controller/usernameController.php");
    $obj = new UsernameController();
   // $rows = $obj->index();
?>

<div class="card m-4">
    <div class="card-header d-flex justify-content-between">
        <h3>Administrador de usuarios</h3>
        <button  class="btn btn-primary" id="activarModalAgregar">Agregar nuevo usuario</button>
    </div>
    <div class="card-body">
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
    </div>
</div>


    <!-- Modal MODIFICAR-->
    <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalModificarLabel">Desea modificar el registro?</h1>
                </div>
                
                    <div class="modal-body">
                        Ingrese los datos que desea modificar en el registro
                        <form>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" name="idInput" id="idInput">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Nuevo nombre</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombreInput" id="nombreInput">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnCerrarModificar">Cerrar</button>
                        <button type="button" class="btn btn-danger" id="btnDatos">Aceptar</button>
                    </div>
                
            </div>
        </div>
    </div>


<!-- Modal AGREGAR-->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAgregarLabel">Ingrese los datos del nuevo usuario</h1>
                </div>             
                    <div class="modal-body">
                        <form class="row">
                            <div class="mb-3 row col-6">
                                <label  class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombreInputAgregar">
                                </div>
                            </div>
                            <div class="mb-3 row col-6">
                                <label  class="col-sm-3 col-form-label">Usuario</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="usuarioInputAgregar">
                                </div>
                            </div>
                            <div class="mb-3 row col-6">
                                <label  class="col-sm-3 col-form-label">Contraseña</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="passInputAgregar">
                                </div>
                            </div>
                            <div class="mb-3 row col-6">
                                <label  class="col-sm-3 col-form-label">Rol</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="rolInputAgregar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnCerrarAgregar">Cerrar</button>
                        <button type="button" class="btn btn-danger" id="btnAgregar">Aceptar</button>
                    </div>
                
            </div>
        </div>
    </div>

<!-- Modal-->
<div class="modal fade" id="modalRta" tabindex="-1" aria-labelledby="modalRtaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitulo"></h1>
                </div>             
                    <div class="modal-body">
                        <p id="modalRtaMensaje"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btnModalRtaAceptar">Aceptar</button>
                    </div>                
            </div>
        </div>
    </div>




<?php
    require('C:\laragon\www\Crud-PDO\view\head/footer.php');
?>

