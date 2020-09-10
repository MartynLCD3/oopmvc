<?php
include_once './conexion.php';

class Categoria 
{

	public static function getCategorias()
	{
	
		$conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query( "SELECT * FROM categorias" );
	
		return $stmt->fetchAll();
	
	}
	
}	
