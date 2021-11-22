<?php
   // Permet de savoir s'il y a une session. 
  // C'est à dire si un utilisateur c'est connecté à votre site 
session_start();
  // Fichier PHP contenant la connexion à votre BDD
$bdd = new PDO("mysql:host=127.0.0.1;dbname=mydb;charset=utf8", "root", "");

if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    if($valid){     
    }
    
}  
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC LIMIT 10');
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
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">


</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button" id="navbar" style="background-color:#fff; position: fixed; width: 100%; z-index: 1032; box-shadow: 8px 8px 12px #000;">
        <div class="container">
            <div><a class="navbar-brand" href="#"><span><img src="assets/img/Logo.png" style="width: 120px;"></span> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav nav-right">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php" style="font-weight: 900">Acceuil </a></li>&nbsp;&nbsp;
                     <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="font-weight: 900">Nos articles </a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff; border-color: #cc0c0b;"><a class="dropdown-item" role="presentation" href="actu.php">Actualité</a><a class="dropdown-item" role="presentation" href="viepr.php">Vie pratique</a><a class="dropdown-item" role="presentation" href="#" >Santé et Bien etre</a><a class="dropdown-item" role="presentation" href="consomation.php">Consommation</a><a class="dropdown-item" role="presentation" href="astuces.php">Trucs et astuces</a><a class="dropdown-item" role="presentation" href="arnaques.php">Arnaques</a></div>
                    </li>&nbsp;&nbsp;
                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="tarifs.php" style="font-weight: 900">Bon Plans !</a></li>&nbsp;&nbsp;
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog.php" style="font-weight: 900" >Contactez Nous </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Langues</a>
                        <div class="dropdown-menu" role="menu" style="background-color:#fff; border-color: #cc0c0b;"><a class="dropdown-item" role="presentation" href="#">Français</a><a class="dropdown-item" role="presentation" href="#">Englais</a></div>
                    </li>
                </ul>
                <p class="ml-auto navbar-text actions">
                    <a class="btn btn-outline-light btn-lg" href="inscription.php" style="background-color: #cc0c0b; border-radius: 5px; height: 45px; color: #fff; font-weight: 900; font-size: 16px;">S'inscrire</a>&nbsp;
                    <a class="btn btn-outline-light btn-lg" role="button" href="connexion.php" style="border-radius: 5px; border-color: #cc0c0b; font-weight: 900; font-size: 16px; color: #cc0c0b;">Se connecter</a>
                </p>
            </div>

        </div>
    </nav>
<br><br><br><br><br><br>

 <section>

    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"></h2>     
            </div>
            <div class="row articles"><?php while($a = $articles->fetch()) { ?>
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/miniatures/<?= $a['id'] ?>.jpg"></a><br><br>

                    <h3 href="connexion.php" class="name" style="color: #0B2161;font-size: 30px;"><?= $a['titre']?></h3>
                     <p style="font-weight: bold; font-size: 15px; font: #222222"><?= $a['description']?><a href="connexion.php"> [Lire la suite] </a></p><br>
              
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>

     <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/mure.jpg&quot;);color: rgba(255,255,255,0.0);background-color: rgba(255,255,255,0.85);height: 600px;">
            <div id="promo" class="text">
                <div class="jumbotron" style="background-color: rgba(204,12,11,0.35);">
                    <h1>Pour toutes locations courte durée de type Airbnb</h1><button class="btn btn-outline-light btn-lg" type="button" onclick="self.location.href='estimation.php'">Estimer mes revenus</button></div>
            </div>
        </section>
        <section  id="clean-info-dark-section">
                <div id="block-heading">
                    <h2 class="text-bnb" id="text-bnb">BESTBNB CONCIERGERIE EST&nbsp;VOTRE&nbsp;MEILLEUR&nbsp;COLLABORATEUR <br>POUR GERER&nbsp;VOS LOCATIONS AIRBNB<br><br><br></h2>
                    <p>Offrez vous les meilleurs services avec <br>BestBnb Conciergerie,<br> nous s'occupons de tout annonces sur Airbnb, lest clé, le ménage ou le lessive, nous acceuillons les voyageurs, et nous assuront leurs bien-etre<br></p>
                </div>
            
        </section>
       
<br>
<br>
<br>
        <section class="hero-section" id="hero-section" style="background-color: #cc0c0b; color: #fff;">
           <div class="row" id="row"  style="width: 100%;" >
                <div class="col" id="text-left">
                    <h4 style="text-align: center;">FORMULE ALL INCLUSIVE (Premium)<br>BESTBNB</h4><br>
                        <ul>
                            
                            <li>Gestion d'annonce</li>
                            <li>Check-in et remise des clés</li>
                            <li>Assistance des voyageurs<br>24h/24 et 7j/7</li>
                            <li>Check-out et récupération des clés</li>
                            <li>Ménage professionnel</li>
                            <li>Kit de welcome (savon, gel douche et shampooing) pour vos hôtes</li>
                                                   
                        </ul>
                </div>
                <div class="col" id="text-right">
                     
                        <h4 style="text-align: center;">Confiez nous votre logement et <br> nous <br> accrôitrons vos revenus</h4>
                        <br>
                        <br>

                        <button class="btn btn-outline-light btn-lg" style="width: 300px;">ESTIMER MES REVENUE</button>
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








<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 324.5,
              $SlideSpacing: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
     <script type="text/javascript">jssor_1_slider_init();</script>


    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>


    <section>
        


    <div id="jssor_1" style="position:relative;margin:0 auto;top:1800px;left:0px;width:1000px;height:462px;overflow:hidden;visibility:hidden;">

        <div data-u="slides" style="cursor:default;position:relative;top:1800px;left:0px;width:980px;height:200px;overflow:hidden;">
            <div>
                <img data-u="image" src="assets/css/img/image1.jpg" />
            </div>
            <div>
                <img data-u="image" src="assets/css/img/image2.jpg" />
            </div>
            <div>
                <img data-u="image" src="assets/css/img/image3.jpg" />
            </div>
            <div>
                <img data-u="image" src="assets/css/img/image4.jpg" />
            </div>


        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
            </svg>
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
    <script src="assets/js/opacite.js"></script>
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
   




</body>


</html>