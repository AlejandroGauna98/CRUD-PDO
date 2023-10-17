<?php
require_once("C:\laragon\www\Crud-PDO\controller/usernameController.php");
    $id = $_POST['id'];
    $obj = new UsernameController();
    $obj->delete($id);

/*    $response = array();
if ($obj->delete($id)) {
    $response['success'] = true;
    $response['message'] = "Registro eliminado correctamente";

} else {
    $response['success'] = false;
    $response['message'] = "Error al eliminar el registro";
}*/
$response = $obj->index();

header("Content-Type: application/json");
echo json_encode($response);