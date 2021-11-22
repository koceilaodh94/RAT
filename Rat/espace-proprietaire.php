<?php
session_start();
include_once('includes.php');

// S'il n'y a pas de session alors on ne va pas sur cette page
if(!isset($_SESSION['id'])){ 
  header('Location: home.php'); 
  exit; 
}



// On récupère les informations de l'utilisateur connecté


    $req = $DB->query('Select * from users where idpublic = :idpublic', array('idpublic' => $_SESSION['id']));
    $req = $req->fetch();



?>

<!DOCTYPE html>
<html lang="fr">
	<header>
		<meta charset="utf-8">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/>
		
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<title>Accueil</title>
	</header>
	
	<body>
		
		<?php 
		    if(isset($_SESSION['flash'])){ 
		        foreach($_SESSION['flash'] as $type => $message): ?>
				<div id="alert" class="alert alert-<?= $type; ?> infoMessage"><a class="close">X</span></a>
					<?= $message; ?>
				</div>	
		    
			<?php
			    endforeach;
			    unset($_SESSION['flash']);
			}
		?> 
<h2>Voici le profil de <?= $req['nomUser'] . $req['prenomUser']; ?></h2>
﻿    <div>Quelques informations sur vous : </div>
    ﻿<ul>
    ﻿  <li>Votre id est : <?= $req['idpublic'] ?></li>
      <﻿li>Votre mail est : <?= $req['mail'] ?></li>

    </ul>
	
		<div class="container-fluid">
				
	        <div class="row">
		       	
		       	<div class="col-xs-1 col-sm-2 col-md-3"></div>
		       	<div class="col-xs-10 col-sm-8 col-md-6">
			       	
			       	<h1 class="index-h1">Accueil</h1>
			       	
			       	<p>Bonjour <?php 
				       
				    	if(!isset($_SESSION['id'])){
					       echo "vous n'êtes pas connecté !";
				    	}else{
				    		if (isset($_SESSION['nomUser']) and isset($_SESSION['prenomUser'])) {
				    			echo $_SESSION['nomUser'] , $_SESSION['prenomUser'];
				    		} else {
					    	echo $_SESSION['mail'];
				    		}

				       	
				       	}
				       	?>
				       	
				    </p>



		<?php 

		if (file_exists("assets/img/avatars/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])) {
		?>
		<img src="assets/img/avatars/<?php echo $_SESSION['avatar']?>" alt="photo de profile" style="width: 120px; height: 150px"><br><br>
		<?php
		}else {	
		?>
		<img src="assets/img/avatars/default.png" alt="photo de profile" style="width: 120px; height: 150px"><br><br>
		<?php
		 } 
		?>
		

			       	<a href="modifierprofileproprietaire.php">Modifier votre profil</a>
			       	<br/>
			       	<a href="Réservations.php">Réservations</a>
			       	<br>
			       	<a href="disponibilite.php">Disponibilité</a>
			       	<br>
			       	<a href="Revenus.php">Mes revenus</a>
			       	<br>
			       	<a href="">Trouver un concierge</a>
			       	<br>
			       	<a href="deconnexion.php">Deconnexion</a>
		       	</div>
	            <div class="col-xs-1 col-sm-2 col-md-3"></div>
	        </div>
        </div>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>