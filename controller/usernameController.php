<?php
    class UsernameController{
        private $model;

        public function __construct(){
            require_once("C:\laragon\www\Crud-PDO\model/usernameModel.php");
            $this->model = new usernameModel();
        }

        public function guardar($datos){
            $respuesta = $this->model->insertar($datos);
            return $respuesta;
        }

        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header('Location: /index.php');
        }

        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }

        public function update($id,$nombre){
            return ($this->model->update($id,$nombre) != false) ? true : false;
        }
        
        public function delete($id){
            return ($this->model->delete($id)) ? true : false;
        }
    }