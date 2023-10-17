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
}

echo json_encode($res);
