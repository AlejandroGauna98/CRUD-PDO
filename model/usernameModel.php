<?php
    class usernameModel{
        private $PDO;

        public function __construct(){
            require_once("C:\laragon\www\Crud-PDO\config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();

            if(!$this->PDO instanceof PDO){
                die("Error en la conexion");
            }
        }

        public function insertar($nombre){
            $stament = $this->PDO->prepare("INSERT INTO username VALUES(null,:nombre,1)");
            $stament->bindParam(":nombre",$nombre);
            return($stament->execute()) ? $this->PDO->lastInsertId() : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM username WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return($stament->execute()) ? $stament->fetch() : false;
        }

        public function index(){
            $sql = "SELECT * FROM username";
            $query = $this->PDO->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            /*$stament = $this->PDO->prepare("SELECT * FROM username");
            return($stament->execute()) ? $stament->fetchAll() : false;*/
        }

        public function update($id,$nombre){
            $stament = $this->PDO->prepare("UPDATE username SET nombre = :nombre WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":id",$id);
            return($stament->execute())? $id : false;
        }

        //esta funcion borra un registro de la base de datos
        /*public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
            $stament->bindParam(":id",$id);
            return($stament->execute()) ? true : false;
        }*/

        public function delete($id){
            $stament = $this->PDO->prepare("UPDATE username SET estado = 0 WHERE id = :id");
            $stament->bindParam(":id",$id);
            return($stament->execute()) ? true : false;
        }
        
    }