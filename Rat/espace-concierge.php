<?php
session_start();
include_once('includes.php');

// S'il n'y a pas de session alors on ne va pas sur cette page
if(!isset($_SESSION['id'])){ 
  header('Location: home.php'); 
  exit; 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>espace concierge</title>
</head>
<body>
<H1>Bienvenue dans votre espace concierge !</H1>

<br><br>
			       	<p>Bonjour <?php 
				       
				    	if(!isset($_SESSION['id'])){
					       echo "vous n'êtes pas connecté !";
				    	}else{
					    	echo $_SESSION['mail'];
				       	
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

				   	<a href="modifierprofileconcierge.php">Modifier votre profil</a>
 			       	<br>
			       	<a href="deconnexion.php">Deconnexion</a>
</body>
</html>