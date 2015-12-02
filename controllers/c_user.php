<?php
//controller user
if(!isset($_REQUEST['action']) ){
     $_REQUEST['action'] = 'default';
}
$action = $_REQUEST['action'];
require_once('modeles/m_user.php');
switch($action){


	//bouton submit de connexion
	case 'toConnnect' :{
		//On récupère les informations du formulaire
		$identifiant = $_POST['identifiant'];
		$motDePasse = $_POST['motDePasse'];

		//On regarde si l'user existe en base
		$user = User::toConnect($identifiant,$motDePasse);

		//S'il existe on met dans la superglobale SESSION ses informations
		if($user){
			$_SESSION['id_user'] = $user[0]['id_user'];
			$_SESSION['identifiant'] = $user[0]['identifiant']		;
		}

		// Dans tous les cas on redirige sur l'index (pour l'instant)
		header('Location: ./index.php');
		break;
	}

	case 'toDisconnect':{
		include('vues/user/v_deconnection.html');
		header('Location: ./index.php');
		break;
	}



	case 'index' :{
		$listAllUser = User::index();
		include('vues/user/v_index.html');
		break;
	}



	case 'view' :{
		$idUser = $_GET['id'];
		$user = User::view($idUser);
    	include('vues/user/v_view.html');
		break;
	}

    case 'formadd' :{
        include('vues/user/v_add.html');
        break;
    }

	case 'add' :{
        $login = $_POST['identifiant'];
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $mail = $_POST['mail'];
        $naissance = $_POST['naissance'];
        User::add($login,$pwd,$nom,$prenom,$adresse,$cp,$ville,$mail,$naissance);
        header('Location: ./index.php');
		break;
	}


	case 'edit' :{
        $login = $_POST['identifiant'];
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $mail = $_POST['mail'];
        $naissance = $_POST['naissance'];
        $idUser = $_GET['id'];
        User::edit($idUser,$login,$pwd,$nom,$prenom,$adresse,$cp,$ville,$mail,$naissance);
        header('Location: ./index.php');
		break;
	}

	case 'delete' :{
        $idUser = $_POST['id'];
        User::delete($idUser);
        session_destroy();
        unset($_SESSION);
        header('Location: ./index.php');
		break;
	}



    default:
    	header('Location: ./index.php');
    	break;
}

?>
