<?php
include_once('./fct/Connection.php');
class User{

	function __construct()
	{

	}

	public static function toConnect($identifiant,$motDePasse)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user 
			WHERE identifiant ="' .$identifiant . '" 
			AND mot_de_passe = "'.$motDePasse.'"  ');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "Erreur connexion";
	}
	
	// affiche tous les users
	public static function index()
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou liste d'user vide.";
	}

	// affiche un user particulier
	public static function view($idUser)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user WHERE id_user ="' .$idUser  . '"');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou utilisateur non trouvé.";
	}

	// ajoute un user (inscription)
	// je vous aiderai pour le md5 si besoin.
	public static function add()
	{

	}
	// modifie un user
	public static function edit($idUSer)
	{

	}
	// supprime un user
	public static function delete($idUser)
	{

	}


}

?>