<?php
Require_once ('JBBCode/Parser.php');
  // Permet de savoir s'il y a une session. 
  // C'est à dire si un utilisateur c'est connecté à votre site 
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=mydb;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $get_id = htmlspecialchars($_GET['id']);

      $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
      $article->execute(array($get_id));

   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $id = $article['id'];
      $Articles_titre = $article['titre'];
      $Articles_Categories = $article['Categorie'];
      $Articles_description = $article['description'];
      $Articles_contenu = $article['contenu'];

      $parser = new JBBCode\Parser();
      $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());

      $article1 = $bdd->prepare('SELECT compteur FROM article_populaire WHERE id_article_populaire = ?');
      $article1->execute(array($get_id));
       if($article1->rowCount() == 1) {
      $article1 = $article1->fetch();
      $cpt = $article1['compteur'];
      $cpt=$cpt+1;
      
     $req = $bdd->prepare('UPDATE article_populaire
                      SET compteur = ?
                      WHERE id_article_populaire = ?');
     $req->execute(array($cpt,$get_id));
     

        

    }else {}

   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BETWEENETNA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="assets/css/sticky-dark-top-nav.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forum.css">
    <link rel="stylesheet" href="assets/css/recherche.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrapbas.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v2.css">
    <link rel="stylesheet" href="assets/css/Video-Responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-color: rgb(255,255,255,0.1);"> 
    <nav id="navbar" class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button" style="background-color: rgb(255,255,255);">
       <div id ="logo" class="container"><img src="assets/img/logo-Between.png" style="width: 120px; margin-right: 40px;">
            <div><a class="navbar-brand" href="#"><span></span> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only"></span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse"
                id="navcol-1">
            <ul class="nav navbar-nav nav-right">
                <li role="presentation" class="nav-item"><a class="nav-link active" href="index_users.php" style="font-family: Gill Sans, sans-serif;color: #222222;font-size: 20px;">Accueil</a></li>


                    <li class="nav-item dropdown"><a data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link" href="#" style="font-family: Gill Sans, sans-serif;color: #222222;font-size: 20px;">Categories</a>


                        <div role="menu" class="dropdown-menu" style="color: rgb(255,255,255);background-color: #ffffff;">
                          <a role="presentation" class="dropdown-item" href="cat-Jeunesse.php">Jeunesse</a>
                          <a role="presentation" class="dropdown-item" href="cat-Sport.php">Sport</a>
                          <a role="presentation" class="dropdown-item" href="cat-Voyage.php">Voyage</a>
                          <a role="presentation" class="dropdown-item" href="cat-Societe.php">Societé</a>
                          <a role="presentation" class="dropdown-item" href="cat-Economie.php">Economie</a>
                          <a role="presentation" class="dropdown-item" href="cat-Politique.php">Politique</a>
                          <a role="autres" class="dropdown-item" href="cat-Autres.php">Autres</a>
                      </div>
                </li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="about.php" style="font-family: Gill Sans, sans-serif;color: #222222;font-size: 20px;">A Propos</a></li>
                <li role="presentation" class="nav-item"></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="formulaire_de_contact.php" style="font-family: Gill Sans, sans-serif;font-size: 20px;color: #222222;">contact </a></li>
                  
            </ul>
            <p id="identi" class="ml-auto navbar-text actions"><a class="btn btn-light action-button" role="button" href="deconnexion.php" style="font-size: 15px; color: #ffffff; background-color: #222222">Se deconnecter</a>
            </p>
            </p>
</nav>
    <br>
      <main class="page landing-page">
         <br>
         
         <div class="container">
           <img src="miniatures/<?= $id ?>.jpg" style="margin-left: 160px" width="70%"/><br/> <br> <br>
      <a style="font-style: italic;color: #0B2161; font-weight: bold ;text-align: center;"><h1><?= $Articles_titre?></h1></a>
      
     
      <br><br>
      <p><?php  $parser->parse($Articles_contenu);
             echo $parser->getAsHtml(); ?></p>
         </div>
      </section>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong style="color: blue">Partager sur : </strong>
    <a id="twitt" href="http://twitter.com/share" class="twitter-share-button" 
      data-count="vertical" data-via="InfoWebMaster"
      style=""></a>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <br>
    <a id="fb" href="http://facebook.com/share" class="fa fa-facebook" data-via="InfoWebMaster" ></a>
    <script type="text/javascript" src="http://platform.facebook.com/widgets.js"></script>


<br><br><br><br><br><br><br><br><br>
      </main>
   
        </div>
       <footer style="background-color: #222222; width: 103%; margin-left: -21px; ">
        <div  class="row">
            <div class="col-sm-6 col-md-4 footer-navigation" style="height: 218px;width: 219px; margin: -3px; padding: -4px ">
              
                <h3><a href="#"><span>BETWEENATNA</span></a></h3> 
                <p class="links"><a href="index_users.php">Accueil</a><strong>&nbsp;&nbsp;&nbsp;</strong><a href="formulaire_de_contact.php">Contact</a></p>
                <p class="company-name" style="font-weight: bold">BETWEENETNA © 2019 <br> Powered By SIKA SOFTWARE </p> 
            </div>
            <div class="col-sm-6 col-md-4 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">Adresse</span> El 7ouma, Algerie</p>
                </div><br>
                 <strong style="color: orange">Partager sur : </strong>
           &nbsp;<a id="twitt" href="http://twitter.com/share" class="fa fa-twitter" 
      data-count="vertical" data-via="InfoWebMaster"
      style=""></a>
                  <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
   
                  <a href="http://facebook.com/share" class="fa fa-facebook" data-via="InfoWebMaster" ></a>
                   <script type="text/javascript" src="http://platform.facebook.com/widgets.js"></script>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 footer-about">
                <h4 style="font-weight: bold;font-size: 26px>A Propos de nous&nbsp;</h4> 
                <p style="font-size: 16px"> Betweenetna est un webzine djazairi ” إجتماعي و تساهمي” Ga3 les algériens et les algériennes  ypartagiw m3ana les articles, les idées et les videos ta3hom.<p>
                <p><br></p>
    
                    
            </div>
            </div>
            </div>
    <script src="assets/js/opacity.js"></script>
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
     <script src="js/social.js"></script>

</body>


</html>