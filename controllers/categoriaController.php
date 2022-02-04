<?php
    require_once 'models/categoria.php';
    require_once 'models/vehiculo.php';
    class categoriaController{

        public function index() {
            Utils::isAdmin();
            $categoria= new Categoria();
            $categorias = $categoria->getAll();            
            require_once 'views/categoria/index.php';
        }
        
        public function ver() {
            if (isset($_POST['categoria'])) {
                $id = $_POST['categoria'];
                
                //Conseguimos la categoria a mostrar
                $categoria = new Categoria();
                $categoria->setId($id);

                $categoria = $categoria->getOne();
                
                //Conseguimos los productos de la categoria
                $vehiculo = new Vehiculo();
                $vehiculo->setCategoria_id($id);
                $vehiculos = $vehiculo->getAllCategory(); 
                
                
            }           
            require_once 'views/categoria/ver.php';
        }
        

        public function crear(){
            Utils::isAdmin();
            require_once 'views/categoria/crear.php';
        }
        
        public function save(){
            Utils::isAdmin();
            if (isset($_POST) && isset($_POST['nombre'])) {
                //Guardar la caqtegoria en la bd
                $categoria = new Categoria();
                $categoria->setNombre_categoria($_POST['nombre']);
                $save = $categoria->save();
                
            }
            
            if ($save){
                $_SESSION['categoria'] = "complete";
            }else{
                $_SESSION['categoria'] = "failed";
            }
            //Redirigimos a la vista index de categorias que muestra todo el listado
            header("Location:".base_url."categoria/index"); 
            echo var_dump($result);
        }
    }
