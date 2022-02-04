<?php
    require_once 'models/marca.php';
    require_once 'models/vehiculo.php';
    class marcaController{
        
        public function index() {
            Utils::isAdmin();
            $marca= new Marca();
            $marcas = $marca->getAll();            
            require_once 'views/marca/index.php';
        }
        
        public function crear(){
            Utils::isAdmin();
            require_once 'views/marca/crear.php';
        }
        
        public function save(){
            Utils::isAdmin();
            if (isset($_POST) && isset($_POST['nombre'])) {
                //Guardar la caqtegoria en la bd
                $marca = new Marca();
                $marca->setNombre_marca($_POST['nombre']);
                $save = $marca->save();
                
            }
            
            if ($save){
                $_SESSION['marca'] = "complete";
            }else{
                $_SESSION['marca'] = "failed";
            }
            //Redirigimos a la vista index de categorias que muestra todo el listado
            header("Location:".base_url."marca/index"); 
            
        }
    }

