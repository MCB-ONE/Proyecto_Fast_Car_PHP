<?php

class Vehiculo{
    private $id;
    private $marca_id;
    private $categoria_id;
    private $modelo;
    private $stock;
    private $combustible;
    private $puertas;
    private $cambio;
    private $asientos;
    private $carga;
    private $matriculacion;
    private $fecha;
    private $descripcion;
    private $imagen;
    private $precio;
    private $db; //Conexión a base de datos
    
    //Método constructor que genera una conexión a la bd
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getMarca_id() {
        return $this->marca_id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getStock() {
        return $this->stock;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getCombustible() {
        return $this->combustible;
    }

    function getPuertas() {
        return $this->puertas;
    }

    function getCambio() {
        return $this->cambio;
    }

    function getAsientos() {
        return $this->asientos;
    }

    function getCarga() {
        return $this->carga;
    }
    
    function getFecha() {
        return $this->fecha;
    }

    function getMatriculacion() {
        return $this->matriculacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMarca_id($marca_id) {
        $this->marca_id = $this->db->real_escape_string($marca_id);
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    function setStock($stock) {
        $this->stock =  $this->db->real_escape_string($stock);
    }

    function setModelo($modelo) {
        $this->modelo = $this->db->real_escape_string($modelo);
    }

    function setCombustible($combustible) {
        $this->combustible = $this->db->real_escape_string($combustible);
    }

    function setPuertas($puertas) {
        $this->puertas =$this->db->real_escape_string($puertas);
    }

    function setCambio($cambio) {
        $this->cambio = $this->db->real_escape_string($cambio);
    }

    function setAsientos($asientos) {
        $this->asientos = $this->db->real_escape_string($asientos);
    }

    function setCarga($carga) {
        $this->carga = $this->db->real_escape_string($carga);
    }

    function setMatriculacion($matriculacion) {
        $this->matriculacion = $this->db->real_escape_string($matriculacion);
    }
    
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function getAll(){
        $vehiculos = $this->db->query("SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id ORDER BY vei.id DESC;");
        return $vehiculos;
    }
    
    public function getAllCategory(){
        $sql= "SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id WHERE vei.categoria_id={$this->getCategoria_id()};";
        $vehiculos= $this->db->query($sql);
        return $vehiculos;
    }
    
    public function getOne(){
        $vehiculo = $this->db->query("SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id WHERE vei.id= {$this->getId()};");
        return $vehiculo->fetch_object();
    }
    
    public function getOneByReserva($id){
        $sql= "SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id  WHERE vei.id IN (SELECT vehiculo_id FROM reservas WHERE vehiculo_id={$id})";
        $vehciulo= $this->db->query($sql);
        return $vehciulo->fetch_object();
    }
    
    public function getRandom($limit){ //Método para obtener "x" vehiculos aleatorios
        $vehiculos = $this->db->query("SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id ORDER BY RAND() LIMIT $limit;");
        return $vehiculos;
    }
    
    public function getLast($limit){ //Método para obtener los "x" vehiculos más nuevos (Por fecha)
        $vehiculos = $this->db->query("SELECT vei.*, mar.nombre_marca, cat.nombre_categoria FROM vehiculos vei INNER JOIN marcas mar ON vei.marca_id = mar.id INNER JOIN categorias cat ON vei.categoria_id = cat.id ORDER BY fecha DESC LIMIT $limit;");
        return $vehiculos;
    }
    
    public function save(){
        $sql = "INSERT INTO vehiculos VALUES(NULL, '{$this->getMarca_id()}', '{$this->getCategoria_id()}', '{$this->getModelo()}', '{$this->getStock()}', '{$this->getCombustible()}', '{$this->getPuertas()}', '{$this->getCambio()}', '{$this->getAsientos()}', '{$this->getCarga()}', '{$this->getMatriculacion()}', NULL, '{$this->getDescripcion()}', '{$this->getImagen()}', '{$this->getPrecio()}')";
        $save = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }
    
    public function edit(){
        $sql = "UPDATE vehiculos SET stock='{$this->getStock()}', descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', fecha=CURDATE() ";
        
        if ($this->getImagen() !=null) { //Solo concatenamos la actualización de la imagen si llega algún cambio
            $sql.= ", imagen='{$this->getImagen()}'";
        }
        $sql .= " WHERE id={$this->id};";
        
        $save = $this->db->query($sql);

        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        
        if($save){
           $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM vehiculos WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($delete){
           $result = true;
        }
        return $result;
    }
    
}
