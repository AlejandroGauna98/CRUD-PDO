<?php
require 'usernameController.php';

$datos = $_REQUEST;
$data = new UsernameController();


switch($datos['back']){
    case 'extraer':
        $res = $data->index();
        break;
    
    case 'borrar':
        $res = $data->delete($datos['id']);
        break;
    
    case 'agregar':
        $res = $data->guardar($datos);
        break;

    case 'modificar':
        $res = $data->update($datos['id'], $datos['nombre']);
        break;
}

echo json_encode($res);
