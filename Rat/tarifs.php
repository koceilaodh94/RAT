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
</head>

<body>
    <div id="nav-top">
 
                <div id="contact-us"> 
                    <label for="contact-us">Contactez-nous  &nbsp;  | &nbsp;</label>
                        
                            <select id="countries" name="countries" content-type="choices" trigger="true" target="telephone"> 
                                <option value="1" >France</option> 
                                <option value="2" >Suisse</option> 
                            </select> 

                            <select id="telephone" name="telephone" > 
                                <optgroup reference="1"> 
                                    <a href="tel:+33 558 78 08 32"><option value="1" >+33 558 78 08 32</option></a>
                                </optgroup> 
                            
                                <optgroup reference="2"> 
                                    <option value="2" ><a href="tel:+213 773 20 02 62">+213 773 20 02 62</a></option>        
                                </optgroup> 
                            </select> 
                </div> 
           
            
                <div id="list-of-languages">
                    <ul>
                        <li><a href="#">FR </a></li>|<li><a href="">EN</a></li>
                    </ul>
                </div>
            

    </div>    








    
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" id="navbar">
        <div class="container"><a class="logo-bbc" href="#"><img id="logo-bbc" src="assets/img/Logo_BBC_Original.jpg"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php">Accueil</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="villes.php">Nos villes</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="nos-tarifs.php">Nos tarifs</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item" role="presentation"><a  class="nav-link"><button class="btn btn-primary" id="button-inscrire" type="button" onclick="self.location.href='inscription.php'">S'inscrir</button></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link"><button class="btn btn-primary" id="button-connecter"  type="button" onclick="self.location.href='connexion.php'">Se connecter</button></a></li>
                </ul>

            </div>
        </div>
     

    </nav>
     <main class="page landing-page">
        <section style="height: 3000px;"></section>
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