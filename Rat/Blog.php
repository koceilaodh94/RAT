<?php

  // Permet de savoir s'il y a une session. 
  // C'est à dire si un utilisateur c'est connecté à votre site 
session_start();

  // Fichier PHP contenant la connexion à votre BDD

include_once('includes.php');


if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    
    
    if($valid){
        
        
    }
    
}   
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Réponse a tout ! le magazine qui enrichit votre vie</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Contact-Information-bar-line-with-e-mail-link-1.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/contact-us.css">
    <link rel="icon" href="assets/img/Logo_BBC_Original.jpg">
    <link rel="stylesheet" href="assets/css/Article-List.css">
</head>

<body>
          <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button" id="navbar" style="background-color:#fff; position: fixed; width: 100%; z-index: 1032; box-shadow: 8px 8px 12px #000;">
        <div class="container">
            <div><a class="navbar-brand" href="#"><span><img src="assets/img/Logo.png" style="width: 120px;"></span> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav nav-right">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php">Acceuil </a></li>&nbsp;&nbsp;
                     <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Nos articles </a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff; border-color: #cc0c0b;"><a class="dropdown-item" role="presentation" href="#">Actualité</a><a class="dropdown-item" role="presentation" href="#">Vie pratique</a><a class="dropdown-item" role="presentation" href="#">Santé et Bien etre</a><a class="dropdown-item" role="presentation" href="#">Consommation</a><a class="dropdown-item" role="presentation" href="#">SUISSE : +34 773 20 02 32</a><a class="dropdown-item" role="presentation" href="#">Trucs et astuces</a><a class="dropdown-item" role="presentation" href="#">Arnaques</a></div>
                    </li>&nbsp;&nbsp;
                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="tarifs.php">Bon Plans !</a></li>&nbsp;&nbsp;
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog.php">Contactez Nous </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Langues</a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff; border-color: #cc0c0b;"><a class="dropdown-item" role="presentation" href="#">Français</a><a class="dropdown-item" role="presentation" href="#">Englais</a></div>
                    </li>
                </ul>
                <p class="ml-auto navbar-text actions">
                    <a class="btn btn-outline-light btn-lg" href="inscription.php" style="background-color: #cc0c0b; border-radius: 5px; height: 45px; color: #fff; font-size: 16px;">S'inscrire</a>&nbsp;
                    <a class="btn btn-outline-light btn-lg" role="button" href="connexion.php" style="border-radius: 5px; border-color: #cc0c0b; font-size: 16px; color: #cc0c0b;">Se connecter</a>
                </p>
            </div>

        </div>
    </nav>
    <br><br><br><br><br><br><br><br>
     <main class="page landing-page">
        <section>
        	<div class="container" style="text-align: center;color: #000;">
			<ul style="text-decoration: none;display: inline-flex;">
				<ol><a href="">Actualité générales</a></ol>
				<ol><a href="">A propos de BBConciergerie</a></ol>
				<ol><a href="">A propos de Airbnb</a></ol>
			</ul>
			</div>
        </section>
        <section>
    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Articles</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/img/salon.jpg"></a>
                    <h3 class="name">Article Title</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
                

        </section>
    </main>
    <footer class="page-footer dark" id="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/nav-scroll.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script src="assets/js/nav-top.js"></script>
    <script src="assets/js/contact-us.js"></script>
    <script src="assets/js/opacite.js"></script>
    <script src="assets/js/slick.min.js"></script>

</body>


</html>