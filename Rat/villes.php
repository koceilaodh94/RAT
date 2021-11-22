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
    <title>BBV V3</title>
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
    <link rel="stylesheet" href="assets/css/Card-hover-affect-2.css">
</head>

<body>
         <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button" id="navbar" style="background-color:#fff; position: fixed; width: 100%; z-index: 1032; box-shadow: 8px 8px 12px #000;">
                <div class="container">
                    <div><a class="navbar-brand" href="#"><span><img src="assets/img/Logo_BBC_Original.jpg" style="width: 120px;"></span> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>&nbsp;&nbsp;
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav nav-right">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php">Acceuil </a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="villes.php">Villes </a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="tarifs.php">Tarifs</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="blog.php">Blog </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Contact </a>
                                <div class="dropdown-menu" role="menu" style="background-color:#fff; border-color: #cc0c0b;"><a class="dropdown-item" role="presentation" href="#">FRANCE : +33 658 78 08 32</a><a class="dropdown-item" role="presentation" href="#">SUISSE : +34 773 20 02 32</a></div>
                            </li>
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
    <br><br>
     <main class="page landing-page">
        <br><br><br>
        <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/porte rouge.jpg&quot;);color: rgba(255,255,255,0.0);background-color: rgba(255,255,255,0.85);height: 600px;">
            <div id="promo" class="text">
                <div class="jumbotron" style="background-color: rgba(204,12,11,0.35);">
                    <h1>Pour toutes locations courte durée de type Airbnb</h1><button class="btn btn-outline-light btn-lg" type="button" onclick="self.location.href='estimation.php'">Estimer mes revenus</button></div>
            </div>
        </section>
        <br><br><br>
        
<section>
    <div class="container" style="text-align: center;">
    <h2>Nos Villes</h2>
    <p>les villes ou l'équipe de Bestbnb Conciergerie est présent àfin de mieux vous accompagnés tout au long de votre séjour  </p>
        <center><form class="search-form">
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="I am looking for..">
            <div class="input-group-append"><button class="btn btn-light" type="button">chercher</button></div>
        </div>
        </form></center>
    </div>        
</section>

<br><br><br><br>
<section>
        <div class="container">    
           <?php 
           $ville = $bdd->query('SELECT * FROM villes ORDER BY nom DESC');
            
       while($a = $ville->fetch()) { ?>
                    <figure class="snip1563">
                      <img src="assets/fonts/Paris   France  Eiffel tower   Tourist surrounding one of the most famous monuments of Paris.jpg" alt="sample110" style="width: 100%; height: 100%;" />
                      <figcaption>
                        <h4><?= $a['nom'] ?></h4>
                        <p><?= $a['description'] ?></p>
                    </figcaption>
                      <a href="contenu_villes.php?id=<?= $a['id'] ?>"></a>
                    </figure>
            <?php } ?>
        </div>
</section>

    </main>
    <br><br><br>
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
    <script src="assets/js/Card-hover-affect-2.js"></script>

</body>


</html>