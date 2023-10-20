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

        public function insertar($datos){
            $pass = md5($datos['password']); 
            try{
            $stament = $this->PDO->prepare("INSERT INTO username VALUES(null,:nombre,1,:usuario,:pass,:rol)");
            $stament->bindParam(":nombre",$datos['nombre']);
            $stament->bindParam(":usuario",$datos['usuario']);
            $stament->bindParam(":pass",$pass);
            $stament->bindParam(":rol",$datos['rol']);
            return $stament->execute();
           /* if($stament->execute()){
                return true;
            }else{
                
                if($stament->errorInfo()[1] == 1062){
                    return "error solucionado";
                }
                return false;
            }*/
            }catch(PDOException $e){
                
                return false;
            }
           
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
            $stament = $this->PDO->prepare("UPDATE username SET estado = CASE WHEN estado = 1 THEN 0 ELSE 1 END WHERE id = :id");
            $stament->bindParam(":id",$id);
            return($stament->execute()) ? true : false;
        }
        
    }