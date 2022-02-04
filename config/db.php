<?php
/* 
 Class con métodos estáticos para establecer la coneccion a la base de datos
 */
class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'alquiler_coches');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
