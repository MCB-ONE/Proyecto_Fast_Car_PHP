<?php

class Reserva{
    private $id;
    private $usuario_id;
    private $vehiculo_id;
            private $fecha_reserva;
    private $fecha_inicio;
    private $fecha_final;
    private $dias_totales;
    private $coste_total;
    private $estado;
    private $db; //Conexión a base de datos
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getVehiculo_id() {
        return $this->vehiculo_id;
    }

    function getFecha_reserva() {
        return $this->fecha_reserva;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_final() {
        return $this->fecha_final;
    }

    function getDias_totales() {
        return $this->dias_totales;
    }

    function getCoste_total() {
        return $this->coste_total;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setVehiculo_id($vehiculo_id) {
        $this->vehiculo_id = $vehiculo_id;
    }

    function setFecha_reserva($fecha_reserva) {
        $this->fecha_reserva = $fecha_reserva;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_final($fecha_final) {
        $this->fecha_final = $fecha_final;
    }

    function setDias_totales($dias_totales) {
        $this->dias_totales = $dias_totales;
    }

    function setCoste_total($coste_total) {
        $this->coste_total = $coste_total;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function getAll(){
        $reservas = $this->db->query("SELECT * FROM reservas ORDER BY reserva_id DESC;");
        return $reservas;
    }
    
    public function getOne(){
        $reserva= $this->db->query("SELECT * FROM reservas WHERE reserva_id= {$this->getId()};");
        return $reserva->fetch_object();
    }
    
    public function getAllByUser(){
        $sql = "SELECT * FROM reservas WHERE usuario_id = {$this->getUsuario_id()} ORDER BY reserva_id DESC";
        $reservas = $this->db->query($sql);
        return $reservas;
    }
    
    public function save(){
        $sql = "INSERT INTO reservas VALUES('', '{$this->getUsuario_id()}', '{$this->getVehiculo_id()}', curdate(), '{$this->getFecha_inicio()}', '{$this->getFecha_final()}', '{$this->getDias_totales()}', '{$this->getCoste_total()}', 'Por confirmar')";
        $save = $this->db->query($sql);

        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }
    
    public function updateOne($estado) {
        $sql = "UPDATE reservas SET estado='{$estado}' WHERE reserva_id='{$this->getId()}'";
        
        $save = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM reservas WHERE reserva_id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($delete){
           $result = true;
        }
        return $result;
    }
    
}
