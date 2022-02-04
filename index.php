<?php
/*Este archivo es el front dontroller. Se encarga de recoger los parametros get
provininetes de la interacción del usuario, seleccionar el controlador al cual pertenece.
Carga el archivo, crea un objeto de esa clase y llama al método pertinente
que también llega por la url. Incluye y carga todos los archivos necesarios para 
que el sistema funcione, así como la estructura visual básica . */
    session_start();
    require_once 'autoload.php';
    require_once 'config/db.php';
    require_once 'config/parameters.php';
    require_once 'helpers/utils.php';
    require_once 'views/layout/header.php';
    
    function show_error(){
        $error = new errorController();
        $error->index();
    }
    
    if(isset($_GET['controller'])){
           $nombre_controlador = $_GET['controller'].'Controller';
    }elseif(!isset($_GET['controller']) && (!isset($_GET['action']))){
        $nombre_controlador = controller_default;
    }else{
        show_error();
        exit();
    }
    
    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador();
        if(isset($_GET['action'])&& method_exists($controlador, $_GET['action'])){
            $action =$_GET['action'];
            $controlador -> $action();
            
        }elseif(!isset($_GET['controller']) && (!isset($_GET['action']))){
            $default_action= action_default;
            $controlador->$default_action();
        }else{
            show_error();
        }
    }else{
        show_error();
    }
    
    require_once 'views/layout/footer.php';