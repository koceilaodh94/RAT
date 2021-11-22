<?php 
session_start();
include_once('includes.php');

if(isset($_SESSION['id'])){
    header('Location: estimation-coordonnees.php');
    exit;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
     <link rel="icon" href="assets/img/Logo_BBC_Original.jpg">
	<title>Estimation</title>
</head>
<body>
	<button type="button" class="close" aria-label="Close" onclick="self.location.href='home.php'" style="width: 80px;height: 80px;">
  		<span aria-hidden="true" style="width: 50px;height: 50px;">&times;</span>
	</button><br><br><br><br>
 <h1 class="text-center"><strong>Veuillez renseigner vos coordonnées</strong></h1><br>
<div class="container">
	<form method="post">
		 <h2 class="text-center"><strong>2. Coordonnées</strong></h2><br>
		 <div class="form-group">
		 	<label for="nom"><h5>Nom :</h5></label>
		 	<input class="form-control" type="input" name="nom" placeholder=" Votre Nom" value="" required=""><br>
		 	<label for="prenom"><h5>Prénom :</h5></label>
		 	<input class="form-control" type="input" name="prenom" placeholder="Votre Prenom" value="" required=""><br>
		 	<label for="mail"><h5>Email :</h5></label>
		 	<input class="form-control" type="email" name="mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required"><br>
		 	<label for="phone"><h5>Numéros de téléphone :</h5></label>
			<input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required="" placeholder=" Votre numéro de téléphone" required="">

			<small>Format: 123-456-7890</small>
			<br>
			<br>
			<center><button class="btn btn-outline-light btn-lg" type="submit" style="height: 50px; border-color: #cc0c0b; background-color: #fff; background-color: #cc0c0b; width: 150px;" onclick="self.location.href='estimation-detail.php'">Suivant</button></center>
		 	</div>
	</form>
</div>
</body>
</html>