<?php
include_once './conexion.php';

class Producto 
{

	public static function getProductos()
	{
	
		$conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query( "SELECT * FROM productos order by cod_producto asc" );
	
		return $stmt->fetchAll();
	
	}
	
	public static function insertar( $POSTREQUEST ) 
	{
	
		$conexionpdo = Conexion::getInstance();
		$sentencia = $conexionpdo->prepare( "INSERT INTO productos (cod_categoria, nombre, precio, stock) 
						     VALUES (:cod_categoria, :nombre, :precio, :stock)" );

		$sentencia->bindValue( ':cod_categoria' , $POSTREQUEST[ 'cod_categoria' ] );
		$sentencia->bindValue( ':nombre' 	, $POSTREQUEST[ 'nombre' 	] );
		$sentencia->bindValue( ':precio'	, $POSTREQUEST[ 'precio'	] );
		$sentencia->bindValue( ':stock'		, $POSTREQUEST[ 'stock'		] );
	
		$sentencia->execute();
		
	}
	
	public static function editar( $POSTREQUEST )
       	{
		
		$conexionpdo = Conexion::getInstance();
		$sentencia = $conexionpdo->prepare( "UPDATE productos 															   SET cod_categoria=:cod_categoria, nombre=:nombre, precio=:precio, stock=:stock
						    WHERE cod_producto = :cod_producto" );
												   
		$sentencia->bindValue( ':cod_producto' 	, $POSTREQUEST[ 'cod_producto'  ] );
		$sentencia->bindValue( ':cod_categoria' , $POSTREQUEST[ 'cod_categoria' ] );
		$sentencia->bindValue( ':nombre'	, $POSTREQUEST[ 'nombre'	] );
		$sentencia->bindValue( ':precio'	, $POSTREQUEST[ 'precio'	] );
		$sentencia->bindValue( ':stock'		, $POSTREQUEST[ 'stock' 	] );
	
		$sentencia->execute();
		
	}
	
	
	public static function eliminar( $cod_producto )
	{
	
		$conexionpdo = Conexion::getInstance();
		
		$sql = "DELETE FROM productos WHERE cod_producto=".$cod_producto;
		
		$conexionpdo->exec( $sql );
	
	}
	
	public static function getProductoPorId( $cod_producto )
	{
	
		$conexionpdo = Conexion::getInstance();
	
		$stmt = $conexionpdo->query( "SELECT * FROM productos where cod_producto=".$cod_producto );
	
		return $stmt->fetch();
	}

}	
