<?php

class Utils {
    public static function deleteSession($name){       
        if(isset($_SESSION[$name])){
            $_SESSION[$name]=NULL;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    
    public static function isAdmin(){ //Funcion que usaré para capar el acceso a algunos metodos/acciones
        if (!isset($_SESSION['admin'])) {
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isIdentity(){
	if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
	}else{
            return true;
	}
    }
    
    public static function showCategorias(){//Metodos que devuelven todos los registros de las tablas que puede necesitar
        require_once 'models/categoria.php';
        $categoria= new Categoria();
        $categorias = $categoria->getAll();            
        return $categorias;
    }
    
    public static function showMarcas(){
        require_once 'models/marca.php';
        $marca= new Marca();
        $marcas = $marca->getAll();            
        return $marcas;
    }
    
}


