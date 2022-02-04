<?php
/*Los controladores son archivos que contienen las clases y sus métodos 
 (acciones) de cada objeto que necesitaremos durante el desarrollo de la webapp*/
    
require_once 'models/usuario.php';
    class usuarioController{
        public function index(){
            echo "Controlador usuario, Acción Index";
        }
        
        public function registro(){
            require 'views/usuario/registro.php';
            
        }
        
        public function save(){
            if(isset($_POST)){
                
                $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;
                        
                if ($nombre && $apellidos && $email && $password && $telefono) {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setTelefono($telefono);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);

                    $save = $usuario->save();//Recuperamos el resultado de la consulta sql del modelo usuario y comprobamos si se ha realizado correctamente
                    if($save){
                        $_SESSION['register']= "complete";
                    }else{
                        $_SESSION['register']= "failed";
                    }
                }else{
                    $_SESSION['register']= "failed";
                }
            }else {
                 $_SESSION['register']= "failed";
            }
            header("Location:".base_url.'usuario/registro');
            
        }
        
        public function login() {
            if(isset($_POST)){
                //Identificar usuario
                //Consulta sql para verificar credenciales
                $usuario = new Usuario();
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['password']);
                
                $identity= $usuario->login(); //Llamamos al método login del modelo $usuario creado
                
                if ($identity && is_object($identity)) {//Crear una sesisón
                    $_SESSION['identity'] = $identity;
                                        
                    if ($identity->rol == 'admin') {
                        $_SESSION['admin'] = true;
                    }
                }else{
                   $_SESSION['error_login'] = "identificación fallida!";
                }             
            }
            header("Location:".base_url);
        }
        
        public function logout(){
            if (isset($_SESSION['identity'])) {
                unset($_SESSION['identity']);
            }
            if (isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
            }
            header("Location:".base_url );
        }
    }//FIn de la clase/modelo