$(document).ready(function() {
    //$('#tablaIndex').DataTable(); // Inicializa la tabla como DataTable
    var datatable_usuarios = $('#datatable_usuarios');
    extraerDatos();
    function extraerDatos(){
        var data = {back: "extraer"}
        $.ajax({
            data: data,
            url: "/controller/backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                cargar_tabla(response);
            }
        })
    }

    function cargar_tabla(users){
        datatable_usuarios.DataTable({
            destroy: true,
            data: users,
            columns:[
                {data: "id"},
                {data: "nombre"},
                {   data: "estado",
                    render: function(estado){
                        if(estado != 0){
                            return "Activo";
                        }
                        return "Inactivo";
                    }
                },
                {   data: "estado",
                    render: function(estado){
                        if(estado != 0){
                            return `<div class="d-flex justify-content-center gap-2">
                                        <button id="btnVer" class="btn bg-gradient waves-effect waves-light btn-info py-1 px-2" type="button">Ver</button>
                                        <button id="btnModificar" class="btn bg-gradient waves-effect waves-success btn-success py-1 px-2" type="button">Modificar</button>
                                        <button id="btnEliminar" class="btn bg-gradient waves-effect waves-danger btn-danger py-1 px-2" type="button">Eliminar</button>
                                    </div>`
                        }else{
                            return `<div class="d-flex justify-content-center gap-2">
                                        <button id="btnVer" class="btn bg-gradient waves-effect waves-light btn-info py-1 px-2" type="button">Ver</button>
                                        <button id="btnModificar" class="btn bg-gradient waves-effect waves-success btn-success py-1 px-2" type="button">Modificar</button>
                                        <button id="btnActivar" class="btn bg-gradient waves-effect waves-primary btn-primary py-1 px-2" type="button">Activar</button>
                                    </div>`
                        }
                    }}
            ],
            responsive: true,
            info: false,
            ordering: false,
            paging: false
        })
    }
    
    $("#datatable_usuarios tbody").on("click", "button", function () {
        var opt = $(this).attr("id");
        var usuario = datatable_usuarios.DataTable().row($(this).parents("tr")).data();

        switch (opt) {
            case "btnEliminar":
                eliminar(usuario);
                break;

            case "btnVer":
                detalle(usuario);
                break;

            case "btnModificar":
                var userId = usuario['id'];
                abrirModal(userId);
                break;

            case "btnActivar":               
                eliminar(usuario);
                break;
      
        }

    });

    function eliminar(id){
        var id = id['id'];
        var data = {back: "borrar", id:id}
        $.ajax({
            data: data,
            url: "/controller/backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerDatos();
            }
        })
    }

    $(document).on("click", "#btnDatos", function(){  
        var id = $("#idInput").val();
        var nombre = $("#nombreInput").val();
        var data = {back: "modificar", id:id, nombre:nombre}
        $.ajax({
            data: data,
            url: "/controller/backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerDatos();
                $("#modalModificar").modal("hide");
            }
        })
    })

   
    

    function abrirModal(id){
        $("#idInput").val(id);
        $("#modalModificar").modal("show");
    }

    $("#btnAgregar").on("click", function(){
        var nombre = $("#nombreInputAgregar").val();
        var usuario = $("#usuarioInputAgregar").val();
        var pass = $("#passInputAgregar").val();
        var rol = $("#rolInputAgregar").val();
        var data = {back: "agregar", nombre:nombre, usuario:usuario, password: pass, rol:rol}
        $.ajax({
            data: data,
            url: "/controller/backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                mensajeRespuesta(response);
                $("#modalAgregar").modal("hide");
            }
        })
    })

    function mensajeRespuesta(rta){
        if(rta == true){
            $("#modalTitulo").text("Exito");
            $("#modalRtaMensaje").text("El usuario se registro con exito");
        }else{
            $("#modalTitulo").text("Error");
            $("#modalRtaMensaje").text("Hubo un error y no se registro el usuario");
        }
        $("#modalRta").modal("show");
    }
    $("#btnModalRtaAceptar").on("click", function(){
        extraerDatos();
        $("#modalRta").modal("hide");
    })
    
    $("#activarModalAgregar").on("click",function(){
        $("#modalAgregar").modal("show");
    })
    
    $("#btnCerrarAgregar").on("click",function(){
        //limpiamos los valores del modal
        $("#nombreInput").val("");
        $("#modalAgregar").modal("hide");
    });
    
    
    
});

$(document).on("click", "#btnModificar", function(){
    $("#idInput").val();
    $("#modalModificar").modal("show");
});



$("#btnCerrarModificar").on("click",function(){
    //limpiamos los valores del modal
    $("#idInput").val("");
    $("#nombreInput").val("");
    $("#modalModificar").modal("hide");
});





/*var fila;
$(document).on("click",".btnEliminar",function(){
    fila = $(this);
    id = parseInt($(this).closest("tr").find("th").eq(0).text());
    $.ajax({
        url:"delete.php",
        type:"POST",
        dataType: "json",
        data: {id:id},
        success: function(response){     
            $("#tablaIndex").
        }
    });
});*/




