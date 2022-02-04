<?php
/*Archivo con parametros importantes a usar a lo largo del proyecto. Para usarlo 
sobretodo en la llamada a imagenes en las vistas. */

/*Guardo la ruta del dominio del proyecto en una constante para no tener que 
escribirla continuamente*/
define("base_url", "http://localhost/proyecto_fast_car_php/");

/*Guardo en dos constantes el controlador y el método a llamar por defecto*/
define("controller_default", "vehiculoController");
define("action_default", "index");
