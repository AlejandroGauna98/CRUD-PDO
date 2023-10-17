<?php
    require_once("C:\laragon\www\Crud-PDO\controller/usernameController.php");
    $obj = new UsernameController();
    $obj->update($_POST['id'],$_POST['nombre']);