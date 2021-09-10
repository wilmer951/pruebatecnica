<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=dbempleados","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
		

		return $link;

	}

}

?>