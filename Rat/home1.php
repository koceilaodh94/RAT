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
    <link rel="icon" href="assets/img/Logo_BBC_Original.jpg">
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/sticky-dark-top-nav-with-dropdown.css">
</head>

<body>
  

    <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button" id="navbar" style="background-color:#fff; position: fixed; width: 100%; z-index: 1032;">
        <div class="container">
            <div><a class="navbar-brand" href="#"><span><img src="assets/img/Logo.png" style="height: 70px;"></span> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav nav-right">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html">home </a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about.html">about </a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="faq.html">faq </a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.html">contact </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Nous contacter </a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff; "><a class="dropdown-item" role="presentation" href="#">FRANCE : +33 658 78 08 32</a><a class="dropdown-item" role="presentation" href="#">SUISSE : +34 773 20 02 32</a></div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Langues</a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff;"><a class="dropdown-item" role="presentation" href="#">Français</a><a class="dropdown-item" role="presentation" href="#">Englais</a></div>
                    </li>
                </ul>
                <p class="ml-auto navbar-text actions"><a class="btn btn-light action-button" href="login.html" style="background-color: #cc0c0b; border-radius: 5px; height: 45px; width:100px; color: #fff;">Log In</a>&nbsp;&nbsp;<a class="btn btn-light action-button" role="button" href="signup.html" style="border-radius: 5px; height: 45px;">Sign Up</a></p>
            </div>
        </div>
    </nav>


     <main class="page landing-page">
        <br><br><br>
        <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/porte rouge.jpg&quot;);color: rgba(255,255,255,0.0);background-color: rgba(255,255,255,0.85);height: 600px;">
            <div id="promo" class="text">
                <div class="jumbotron" style="background-color: rgba(204,12,11,0.35);">
                    <h1>Pour toutes locations courte durée de type Airbnb</h1><button class="btn btn-outline-light btn-lg" type="button" onclick="self.location.href='estimation.php'">Estimer mes revenus</button></div>
            </div>
        </section>
        <section  id="clean-info-dark-section">
                <div id="block-heading">
                    <h2 class="text-bnb" id="text-bnb">BESTBNB CONCIERGERIE EST&nbsp;VOTRE&nbsp;MEILLEUR&nbsp;COLLABORATEUR <br>POUR GERER&nbsp;VOS LOCATIONS AIRBNB<br><br><br></h2>
                    <p>Offrez vous les meilleurs services avec <br>BestBnb Conciergerie,<br> nous s'occupons de tout annonces sur Airbnb, les clé, le ménage ou le lessive, nous acceuillons les voyageurs, et nous assuront leurs bien-etre<br></p>
                </div>
            
        </section>
       
<br>
<br>
<br>
        <section class="hero-section" id="hero-section"">
           <div class="row" id="row"  style="width: 100%;" >
                <div class="col" id="text-left">
                    <h4 style="text-align: center;">FORMULE ALL INCLUSIVE (Premium)<br>BESTBNB</h4><br>
                        <ul>
                            
                            <li>Gestion d'annonce</li>
                            <li>Check-in et remise des clés</li>
                            <li>Assistance des voyageurs <br>24h/24 et 7j/7</li>
                            <li>Check-out et récupération des clés</li>
                            <li>Ménage professionnel</li>
                            <li>Kit de welcome (savon, gel douche et shampooing) pour vos hôtes</li>
                                                   
                        </ul>
                </div>
                
               
                <div class="col" id="text-right">
                     
                        <h4 style="text-align: center;">Confiez nous votre logement et <br> nous <br> accrôitrons vos revenus</h4>
                        <br>
                        <br>

                        <button class="btn btn-outline-light btn-lg" style="width: 300px;" onclick="self.location.href='estimation.php'">ESTIMER MES REVENUE</button>
                        <br>
                        <br>

                        <button class="btn btn-outline-light btn-lg" style="width: 300px;" type="button">VOIR UN EXEMPLE</button>
                    
                </div>

            </div>
                <br>
                <br>
                <br>
            <div id="text-buttom">    
            <p>Commission à partir de 20% sur chaque réservation <br> Aucun engagement, ni frais, ni avence </p>
            </div>
        </div>
        <br>
        <br>
        </section>


        <section class="clean-block features" id="clean-block-features">
            <div class="container">
                <div class="block-heading">
                    <p>En plus des services de conciergerie, nous nous occupons de la creation, la diffusion et l'optimisation de votre annonce pour rentabiliser vos locations</p>
                </div>
                <div class="row">
                    <div class="col"><i class="icon-star icon"></i>
                        <h4>Une annonce optimisée</h4>
                        <p>Attirer plus de voyageurs passe par une annonce accrocheuse et  chaleureuse.
Notre équipe optimise le contenu de vos annonces pour les séduire et les attirer maecenas accumsan </p>
                    </div>
                    <div class="col"><i class="icon-pencil icon"></i>
                        <h4>Une équipe très réactive</h4>
                        <p>
Avec BBC, aucune réservation ne sera perdue. Notre équipe répond aux candidats hôtes  dans les 5 min qui suivent leur demande d'information ou de réservation</p>
                    </div>
                    <div class="col"><i class="icon-screen-smartphone icon"></i>
                        <h4>Des clients contents</h4>
                        <p>Pour un meilleur référencement, il est important d'avoir un bon retour client. Notre équipe mettra toute son énergie</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark" id="clean-block-slider">
            
           <div class="container-fluid">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="0">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/1.png" alt="slide 1">
            </div>
            <div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/2.png" alt="slide 2">
            </div>
            <div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/3.png" alt="slide 3">
            </div>
        </div>
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/4.png" alt="slide 4">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/5.jpg" alt="slide 5">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/6.jpg" alt="slide 6">
            </div>
        </div>
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/7.jpg" alt="slide 7">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="assets/fonts/8.jpg" alt="slide 7">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-lg text-muted"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-lg text-muted"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



        </section>
        <section class="clean-block about-us" id="clean-block-about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Ally Sanders</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="position: fixed; top: 100px;  width: 200px;">
        <button style="position: fixed; width: 100px; border-radius: 5px; background-color: red;" onclick="self.location.href='estimation.php'"></button>
        </div>  
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
    <script src="assets/js/Card-Carousel.js"></script>

</body>


</html>