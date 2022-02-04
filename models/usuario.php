<?php
/*En un modelo creamos entidades = es una clase/instancia que representa a cada registro
(fila) de la base de datos. En este caso va a representar a cada una de las 
filas de la tabla usuarios. Con la clase podremos definir y crear entidades, así
como definir diferentes acciones a realizar con ellas(Mostrar todos, filtrar, borrar, 
etc.)   */
require_once 'config/db.php';

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;
    private $password;
    private $rol;
    private $imagen;
    private $db; //Conexión a base de datos
    
    //Método constructor que genera una conexión a la bd
    function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }
    
    function getNombre() {
        return $this->nombre; 
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre); //Escapamos los caracteres especiales que llegan des de el formulario para hacer las consultas sql de forma segura
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getTelefono()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', 'null')";
        $save = $this->db->query($sql);
        
        $result= false;//Guardo el resultado de la consulta sql para comprobar si se realiza correctamente en el controlador
        if($save){
           $result = true;
        }
        return $result;
    }
    
    public function login() {
        $result = false;//Si No se cumplen las verificaciones siguientes, el método devuelve false
        $email = $this->email; //No usar los métodos getter o setter del modelo (da error, porque cifran los datos)
        $password = $this->password; //Mejor acceder directamente a las propiedades de los objetos
        
        //Comprobar si existe el usuario
        $sql= "SELECT * FROM usuarios WHERE email = '$email'";
        $login= $this->db->query($sql);
        if ($login && $login-> num_rows ==1) { //Consulta correcta y Email no repetido
            $usuario = $login->fetch_object();
            
            //Verificar contraseña
            $verify = password_verify($password, $usuario->password); //Método que verifica igualdad entre variables ecriptadas
            if ($verify) {
                $result = true;
                return $usuario; //En caso que todas las verificaciones sean correctas retorno el objeto $usuario completo
            }
        }
        return $result;
    }
    
}

