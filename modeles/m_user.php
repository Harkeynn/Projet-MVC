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
	public static function add($login,$pwd,$nom,$prenom,$adresse,$cp,$ville,$mail,$naissance)
	{
        $bdd=Connection::db_connect();
        $req = $bdd->prepare('INSERT INTO user (identifiant, mot_de_passe, nom, prenom, adresse_rue, adresse_cp, adresse_ville, email, date_de_naissance) VALUES (:identifiant, :mot_de_passe, :nom, :prenom, :adresse_rue, :adresse_cp, :adresse_ville, :email, :date_de_naissance)');
        $req->bindParam(':identifiant', $login);
        $req->bindParam(':mot_de_passe', $pwd);
		$req->bindParam(':nom', $nom);
		$req->bindParam(':prenom', $prenom);
		$req->bindParam(':adresse_rue', $adresse);
		$req->bindParam(':adresse_cp', $cp);
		$req->bindParam(':adresse_ville', $ville);
		$req->bindParam(':email', $mail);
		$req->bindParam(':date_de_naissance', $naissance);
        $req->execute();
	}
	// modifie un user
	public static function edit($idUser,$login,$pwd,$nom,$prenom,$adresse,$cp,$ville,$mail,$naissance)
	{
		$bdd=Connection::db_connect();
		$req = $bdd->prepare("UPDATE user
			SET identifiant = '".$login."',mot_de_passe = '".$pwd."',nom = '".$nom."',prenom = '".$prenom."',adresse_cp = '".$cp."',adresse_ville = '".$ville."',adresse_rue = '".$adresse."',email = '".$mail."',date_de_naissance = '".$naissance."'
			WHERE id_user=".$idUser."");
        $req->execute();
	}
	// supprime un user
	public static function delete($idUser)
	{
		$bdd=Connection::db_connect();
		$req = $bdd->prepare('DELETE FROM user WHERE id_user='.$idUser.'');
		$req->execute();
	}


}

?>
