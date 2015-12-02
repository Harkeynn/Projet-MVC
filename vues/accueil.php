<div class="panel panel-primary content">
  <div class="panel-body">
        <h1>Gestion de CV</h1>
        <p>Bienvenue sur le site de gestion des cv</p>
        <p id="test"><span>Pour consulter les users inscrits : </span>
        	<a href="index.php?uc=user&action=index"
    	    	class="medium button">Utilisateurs inscrits
        	</a>
    	</p>
        <?php if(isset($_SESSION['identifiant'])){
            echo '';
        }else{
            ?>
            <p>
                S'inscrire :
                <a href="index.php?uc=user&action=formadd" class="medium button">
                    Inscription
                </a>
            </p>
        <?php } ?>

        </div>
</div>
