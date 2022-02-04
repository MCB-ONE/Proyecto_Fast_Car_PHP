<?php
    require_once 'models/vehiculo.php';
    
    class vehiculoController{
        public function index(){
            $vehiculo = new Vehiculo();
            $vehiculos= $vehiculo->getLast(6);
            //Renderizar vista
            require_once 'views/vehiculo/destacados.php';
            
        }
        
        //Método para mostrar la pagina flota
        public function flota(){
            $vehiculo = new Vehiculo();
            $vehiculos= $vehiculo->getAll();
            //Renderizar vista
            require_once 'views/vehiculo/flota.php';
            
        }
        
        public function ver(){
            if (isset($_GET['id'])) {
                $id= $_GET['id'];  
                
                $vehiculo=new Vehiculo();
                $vehiculo->setId($id);
                $vehi= $vehiculo->getOne(); 
            }
            require_once 'views/vehiculo/ver.php';
        }

        
        public function gestion(){
            Utils::isAdmin();
            $vehiculo = new Vehiculo();
            $vehiculos = $vehiculo->getAll();
            
            require_once 'views/vehiculo/gestion.php';
        }
        
                
        //Método que redirige a la vista para registrar un nuevo vehiculo
        public function crear(){
            Utils::isAdmin();
            //Renderizar vista
            require_once 'views/vehiculo/crear.php';
            
        }
        
        //Método para guardar vehiculo nuevo
        public function save(){
            Utils::isAdmin();
            
            if (isset($_POST)) {
                $categoria = isset($_POST['categoria']) ? $_POST['categoria']: false;
                $marca = isset($_POST['marca']) ? $_POST['marca']: false;
                $modelo = isset($_POST['modelo']) ? $_POST['modelo']: false;
                $stock = isset($_POST['stock']) ? $_POST['stock']: false;
                $combustible = isset($_POST['combustible']) ? $_POST['combustible']: false;
                $puertas = isset($_POST['puertas']) ? $_POST['puertas']: false;
                $cambio = isset($_POST['cambio']) ? $_POST['cambio']: false;
                $asientos = isset($_POST['asientos']) ? $_POST['asientos']: false;
                $carga = isset($_POST['carga']) ? $_POST['carga']: false;
                $matriculacion = isset($_POST['matriculacion']) ? $_POST['matriculacion']: false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']: false;
                //$imagen = isset($_POST['imagen']) ? $_POST['imagen']: false;
                $precio = isset($_POST['precio']) ? $_POST['precio']: false;                                          
       
                if ($categoria && $marca && $modelo && $stock && $combustible && $puertas && $cambio && $asientos && $carga && $matriculacion && $descripcion && $precio) {
                    $vehiculo = new Vehiculo();
                    $vehiculo->setCategoria_id($categoria);
                    $vehiculo->setMarca_id($marca);
                    $vehiculo->setModelo($modelo);
                    $vehiculo->setStock($stock);
                    $vehiculo->setCombustible($combustible);
                    $vehiculo->setPuertas($puertas);
                    $vehiculo->setCambio($cambio);
                    $vehiculo->setAsientos($asientos);
                    $vehiculo->setCarga($carga);
                    $vehiculo->setMatriculacion($matriculacion);
                    $vehiculo->setDescripcion($descripcion);
                    $vehiculo->setPrecio($precio);
                     
                    if (isset($_FILES['imagen'])) {//Comprobamos que existe el archivo subido antes de guardarlo
                        //Guardar imagen en base de datos
                        $file = $_FILES['imagen'];
                        $fileName = $file['name'];
                        $fileType = $file['type'];
                            
                        if($fileType == "image/jpg" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/gif"){

                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 007, true);
                            }
                            $vehiculo->setImagen($fileName);  
                            move_uploaded_file($file['tmp_name'], 'uploads/images/'.$fileName); 
                        }
                    }
                    
                    if (isset($_GET['id'])) {//Si llega por GET un id llamamos al metodo editar, de lo contrario, insertamos nuevo registro
                        $id= $_GET['id'];
                        $vehiculo->setId($id);
                        $save = $vehiculo->edit();
                    }else{
                       $save = $vehiculo->save(); 
                    }
                    
                    if ($save){
                        $_SESSION['vehiculo'] = "complete";
                    }else{
                        $_SESSION['vehiculo'] = "failed";
                    }
                    
                }else{
                    $_SESSION['vehiculo'] = "failed";   
                             
                }
            }else{
                $_SESSION['vehiculo'] = "failed";
            }
            
            header('Location:'.base_url."vehiculo/gestion");
        }//Fin métdo save()
        
               
        //Método para editar vehículos
        public function editar(){
            Utils::isAdmin();
            if (isset($_GET['id'])) {
                $id= $_GET['id'];    
                $edit= true;
                
                $vehiculo=new Vehiculo();
                $vehiculo->setId($id);
                $vehi= $vehiculo->getOne();
 
                require_once 'views/vehiculo/crear.php';
            }else{
                header('Location:'.base_url.'vehiculo/gestion');
            }
        }
        
        //Método para eliminar vehículos
        public function eliminar(){
            Utils::isAdmin();
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $vehiculo = new Vehiculo();
                $vehiculo->setId($id);
                $delete = $vehiculo->delete();
                if ($delete) {
                 $_SESSION['delete']='complete';
                 $_SESSION['delete_id']=$vehiculo->getId();
                }
                else{
                 $_SESSION['delete']='failed';
                }
            }else{
                 $_SESSION['delete']='failed';
            }
            header('Location:'.base_url.'vehiculo/gestion');
            
        }
          
        
        
        
    }
    
    
