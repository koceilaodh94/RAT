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
 <h1 class="text-center"><strong>Veuillez renseigner les details de votre bien</strong></h1><br><br>
<div class="container">
	<form method="post">
		 <h2 class="text-center"><strong>3. Details</strong></h2><br><br>
		 <div class="form-group">
		 </div>	
		 	
	</form>
</div>
</body>
</html>