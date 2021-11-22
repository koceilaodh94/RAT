<?php
session_start();
include_once('includes.php');



if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    
    $Adresse = htmlspecialchars(trim($Adresse));
    $howmuch1 = htmlspecialchars(trim($howmuch1));
    $howmuch2 = htmlspecialchars(trim($howmuch2));
    $howmuch3 = htmlspecialchars(trim($howmuch3));
    if (empty($BarreRecherche)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez saisir votre adresse !";
    }
    if(empty($howmuch1)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez saisir la capacité d'acceuil !";
    }
    
    if(empty($howmuch2)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez saisir le nombre de Chambres !";
    }
    if(empty($howmuch3)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez saisir le nombre de salle de bains !";
    }         
    if($valid){
        
        $id_public = uniqid();

                    $DB->insert('Insert into estimations (AdresseRecherche, capacitéAcceuil, nbrroom, nbrbathroom, idpublic) values (:AdresseRecherche, :capacitéAcceuil, :nbrroom, :nbrbathroom, :idpublic)', array('AdresseRecherche' => $BarreRecherche, 'capacitéAcceuil' => $howmuch1, '   nbrroom' => $howmuch2, 'nbrbathroom' => $howmuch3, 'idpublic' => $id_public));


        
        $_SESSION['flash']['success'] = "Votre inscription a bien été prise en compte, connectez-vous !";
        header('Location: estimation-coordonnees.php');
        exit;
        
    }   
}   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
     <link rel="icon" href="assets/img/Logo_BBC_Original.jpg">
     <link rel="stylesheet" type="text/css" href="assets/css/autocomplete_search_places.css">
     <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
	<title>Estimation</title>
</head>
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


	<button type="button" class="close" aria-label="Close" onclick="self.location.href='home.php'" style="width: 80px;height: 80px;">
  	<span aria-hidden="true" style="width: 50px;height: 50px;">&times;</span>
	</button><br>
    <h1 class="text-center"><strong>Estimer Vos Revenus</strong></h1><br><br>
    <div class="container">

	<form method="_POST">
 		  <h2 class="text-center"><strong>1. Proprieté</strong></h2><br>
          <div class="form-group">
            <label for="form-address">Efectuer une recherche :</label>
            <input type="search" class="form-control" id="form-address" placeholder="rechercher l'adresse de votre bien" />
          </div>
          <div class="form-group">
            <label for="form-address2">Rue</label>
            <input type="text" class="form-control" id="form-address2" placeholder="votre rue" />
          </div>
          <div class="form-group">
            <label for="form-city">Ville</label>
            <input type="text" class="form-control" id="form-city" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="form-zip">Code postale :</label>
            <input type="text" class="form-control" id="form-zip" placeholder="Code postal">
          </div>
		<div class="form-group">
			<center>
			<label for="howmuch"><h4> Capacité d'accueil </h4></label>&nbsp;
            <?php
                            if(isset($error_howmuch1)){
                                echo $error_howmuch1."<br/>";
                            }   
            ?>
			<input type="number" name="howmuch1" min="0" style="border-color: #cc0c0b; width: 80px; border-radius: 5px;" required="" value="<?php if (isset($howmuch1)) echo $howmuch1; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="howmuch"> <h4> Chambres </h4></label>&nbsp;
            <?php
                            if(isset($error_howmuch2)){
                                echo $error_howmuch2."<br/>";
                            }   
            ?>
			<input type="number" name="howmuch2" min="0" style="border-color: #cc0c0b; width: 80px; border-radius: 5px;" required="" value="<?php if (isset($howmuch2)) echo $howmuch2; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="howmuch"><h4>Salles de bains </h4></label>&nbsp;
            <?php
                            if(isset($error_howmuch3)){
                                echo $error_howmuch3."<br/>";
                            }   
            ?>
			<input type="number" name="howmuch3" min="0" style="border-color: #cc0c0b; width: 80px; border-radius: 5px;" required="" value="<?php if (isset($howmuch3)) echo $howmuch3; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</center>		
		</div><br><br><br>
		<center><button class="btn btn-outline-light btn-lg" type="submit" style="height: 50px; border-color: #cc0c0b; background-color: #fff; background-color: #cc0c0b; width: 150px;" onclick="self.location.href='estimation-coordonnees.php'">Suivant</button></center>
	</form>
</div>
<script src="assets/js/autocomplete_search_places.js"></script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
</body>
</html>