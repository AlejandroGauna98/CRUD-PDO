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
                {   data: null,
                    render: function(estado){
                        if(estado != 0){
                            return `<div class="d-flex justify-content-center gap-2 column-gap-0">
                                        <button id="btnVer" class="btn bg-gradient waves-effect waves-light btn-info py-1 px-2" type="button">Ver</button>
                                        <button id="btnModificar" class="btn bg-gradient waves-effect waves-success btn-success py-1 px-2" type="button">Modificar</button>
                                        <button id="btnEliminar" class="btn bg-gradient waves-effect waves-danger btn-danger py-1 px-2" type="button">Eliminar</button>
                                    </div>`
                        }else{
                            return `<div class="d-flex justify-content-center gap-2 column-gap-0">
                                        <button id="btnVer" class="btn bg-gradient waves-effect waves-light btn-info py-1 px-2" type="button">Ver</button>
                                        <button id="btnModificar" class="btn bg-gradient waves-effect waves-success btn-success py-1 px-2" type="button">Modificar</button>
                                        <button id="btnEliminar" class="btn bg-gradient waves-effect waves-danger btn-primary py-1 px-2" type="button">Activar</button>
                                    </div>`
                        }
                    }}
            ]
        })
    }
    
    $("#datatable_usuarios tbody").on("click", "button", function () {
        var opt = $(this).attr("id");
        var usuario = datatable_usuarios.DataTable().row($(this).parents("tr")).data();

        switch (opt) {
            case "btnEliminar":
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




