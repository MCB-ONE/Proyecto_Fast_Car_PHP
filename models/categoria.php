<?php

class Categoria{
    private $id;
    private $nombre_categoria;
    private $db; //Conexión a base de datos
    
    //Método constructor que genera una conexión a la bd
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre_categoria() {
        return $this->nombre_categoria; 
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $this->db->real_escape_string($nombre_categoria);
    }

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
    }
    
    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $categoria->fetch_object();
    }
    
    
    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre_categoria()}', NULL, NULL)";
        $save = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }
    
}