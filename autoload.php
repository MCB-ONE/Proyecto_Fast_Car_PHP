<?php
    //Función que carga las clases existentes en los controladores de forma automática
    function controllers_autoload($classname){
        include 'controllers/' . $classname. '.php';
    }

    spl_autoload_register('controllers_autoload');