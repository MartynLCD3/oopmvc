<?php

class Conexion 
{ 
	
	protected static $instance = null; 
	protected static $hostname = 'localhost';
	protected static $username = 'root';
	protected static $password = '';
	protected static $dbname   = 'dbName';
	
	private function __construct() {} 
	
	private function __clone() {}

	public static function getInstance()
  	{ 
     
		if( !isset( self::$instance ) ) 
		{ 
			
			self::$instance = new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password); 
		
		} 
		
		return self::$instance; 
	
	}

}
