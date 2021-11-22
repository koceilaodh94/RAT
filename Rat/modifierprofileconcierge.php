<?php
session_start();
include_once('includes.php');

if(!isset($_SESSION['mail'])){
	header('Location: espace-concierge.php');
	exit;
}

if(!empty($_POST)){
	extract($_POST);
	$valid = true;

	if($modifier == "form"){
		$Mail = htmlspecialchars(trim($Mail));
	
		if(empty($Mail)){
			$valid = false;
			$_SESSION['flash']['danger'] = "Veuillez mettre un email !";
			
		}
		
		$req = $DB->query("Select email from users where idpublic = :id", array('id' => $_SESSION['id']));
		$req = $req->fetch();
		
		if($Pseudo == $_SESSION['mail']){
			$valid = false;
			$_SESSION['flash']['info'] = "Votre mail est le même";
		
		}
		
		if($valid){
			
			$DB->insert("UPDATE users SET mail = :newmail where idpublic = :id ", array('id' => $_SESSION['id'], 'newmail' => $Mail));
			
			$_SESSION['mail'] = $Mail;
			$_SESSION['flash']['success'] = "Votre email a bien été modifié !";
			header('Location: modifierprofile.php');
			exit;
		}
		
	}elseif($modifier == "mdp"){
		
		$Password = trim($Password);
		$PasswordConfirmation =trim($PasswordConfirmation);
		$NewPassword = trim($NewPassword);
		
		$req = $DB->query("Select * from user where idpublic = :id", array('id' => $_SESSION['id']));
		$req = $req->fetch();
		
		if(empty($Password)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez mettre votre mot de passe !";
		
		}elseif($Password && empty($PasswordConfirmation)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez confirmer votre mot de passe";

		}elseif($Password != $PasswordConfirmation){
			$valid = false;
			$_SESSION['flash']['danger'] = "Votre mot de passe ne correspond pas au mot de passe !";

		}else if($req['password'] != (crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))){
			$valid = false;
			$_SESSION['flash']['danger'] = "Votre mot de passe n'est pas le bon !";
			
		}else if(empty($NewPassword)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez mettre un nouveau mot de passe !";
	
		}else if($valid){
			
			$DB->insert("UPDATE user SET password = :newpassword where idpublic = :id", array('id' => $_SESSION['id'], 'newpassword' => (crypt($NewPassword, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))));
			
			$_SESSION['flash']['success'] = "Votre nouveau mot de passe a été enregistré !";
			header('Location: modifierprofile.php');
			exit;
			
		}	
	}
}		


if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "assets/img/avatars/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {

				$DB->insert("UPDATE users SET avatar = :avatar WHERE idpublic = :id", array('id' => $_SESSION['id'], 'avatar' => $_SESSION['id'].".".$extensionUpload));
            	header('Location: espace-concierge.php?id='.$_SESSION['id']);
         } else {
            
            $_SESSION['flash']['danger'] = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         
         $_SESSION['flash']['danger'] = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      
      $_SESSION['flash']['danger'] = "Votre photo de profil ne doit pas dépasser 2Mo";
   }

       $req = $DB->query('Select avatar from users where idpublic = :idpublic', array('idpublic' => $_SESSION['id']));
    $req = $req->fetch();

    $_SESSION['avatar'] = $req['avatar'];

}
?>
<!DOCTYPE html>
<html lang="fr">
	<header>
		
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/>
		
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link rel="icon" href="assets/img/Logo_BBC_Original.jpg">
		
		<title>Modifier profil</title>
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
			

<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<title>PROFILE</title>
</head>
<body>
	<center><h3>Modifier votre profile</h3></center>

		<div class="form-group">
			<form method="post" enctype="multipart/form-data">

				<center>
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

				<input type="file" name="avatar" ><br><br>
				</center>
				<label for="Mail">Email * :</label>
				<input class="form-control" type="email" name="Mail" value="" required=""><br>
				<label for="Password">Mot de passe actuel * :</label>
				<input class="form-control" type="password" name="Password" value="" required=""><br>
				<label for="newpassword">Nouveau mot de passe :</label>
				<input class="form-control" type="password" name="newpassword" value=""><br>
				<label for="newpassword">Confirmer votre mot de passe * :</label>
				<input class="form-control" type="password" name="PasswordConfirmation" value="" required=""><br>
				<label for="nom">Nom * :</label>
				<input class="form-control" type="text" name="nom" value="" required=""><br>
				<label for="prenom">Prenom :</label>
				<input class="form-control" type="text" name="prenom" value="" required=""><br>
				<label for="adresse">Adresse * :</label>
				<input class="form-control" type="text" name="adresse" value="" required=""><br>
				<label for="complément">Complément :</label>
				<input class="form-control" type="text" name="complément" value=""><br>	
				<label for="ville">Ville * :</label>
				<input class="form-control" type="text" name="ville" value="" required=""><br>
				<label for="code-postal">Code postal * :</label>
				<input class="form-control" type="text" name="code-postal" value="" required=""><br><br>
				<center>
				<div class="btn-group" id="btn-form-profile" role="group" aria-label="Basic example">
				<button class="btn btn-primary" type="submit" style="width: 100px; color:#cc0c0b; background-color: #fff; border-color: #cc0c0b;">Enregistrer</button>&nbsp;&nbsp;
				<button class="btn btn-primary" type="button" style="background-color: #cc0c0b; border-color: #cc0c0b;" onclick="self.location.href='espace-concierge.php'">Mon espace</button>
				<br>
				</center>
			</form>
		</div>
</div>
</body>
</html>