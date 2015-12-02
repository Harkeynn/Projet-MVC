<?php

class Connection{

	function __construct()
	{

	}

	public static function db_connect() {
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=site_mvc', 'site_mvc', 'site_mvc');
			return $bdd;
		} 
		catch (Exception $e) {
			die('Erreur : ' .$e->getMessage());
		}
	}



}

?>