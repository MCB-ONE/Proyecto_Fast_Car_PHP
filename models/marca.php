<?php

Class Marca{
    private $id;
    private $nombre_marca;
    private $db; //Conexión a base de datos
    
    //Método constructor que genera una conexión a la bd
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre_marca() {
        return $this->nombre_marca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre_marca($nombre_marca) {
        $this->nombre_marca = $this->db->real_escape_string($nombre_marca);
    }
        
    public function getAll(){
        $marcas = $this->db->query("SELECT * FROM marcas ORDER BY id DESC;");
        return $marcas;
    }
    
    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM marcas WHERE id={$this->getId()};");
        return $categoria->fetch_object();
    }
    
    public function save(){
        $sql = "INSERT INTO marcas VALUES(NULL, '{$this->getNombre_marca()}', NULL, NULL)";
        $save = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }


}
