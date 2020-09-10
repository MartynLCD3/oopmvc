<?php

require './controlador/productoController.php';

if( isset( $_GET[ 'productos' ] ) )

	echo productoController::armarProductos();

if( isset( $_GET[ 'formularioproducto' ] ) )

	echo productoController::formularioProducto( $_GET );

if( isset( $_GET[ 'eliminarProducto' ] ) )
	
	productoController::eliminarProducto( $_GET );

if( isset( $_POST[ 'insertarProducto' ] ) )
	
	productoController::insertarProducto( $_POST );

if( isset( $_POST[ 'editarProducto' ] ) )
	
	productoController::editarProducto( $_POST );

if( empty( $_GET ) && empty( $_POST ) )
	
	echo productoController::armarProductos();	
	
