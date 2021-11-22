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



      $article = $bdd->prepare('SELECT compteur FROM article_populaire WHERE id = ?');
      $article->execute(array($get_id));

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mon Article</title>
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
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
</head>

<body id="page-top">
    <div id="wrapper">
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"style= "background-image: url(assets/img/Log.jpg);opacity: 0.9">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                   
                    <div class="sidebar-brand-text mx-3"><span>BETWEENETNA</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    

                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="parametre-profil.php"><i class="fas fa-table"></i><span>Profil</span></a></li>
                   
                    <li class="nav-item" role="presentation"><a class="nav-link" href="article-admin.php"><i class="fas fa-window-maximize"></i><span>Mes Articles</span></a></li>
                </ul>

                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                       
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span><img class="border rounded-circle img-profile" src="assets/img/computer.jpg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="admin_deconnexion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Deconnexion</a></div>
                    </li>
                    </li>
                    </ul>
            </div>
            </nav>
      <main class="page landing-page">
         <br><br><br><br>
      <section>
         
         <div class="container">
      <a style="text-align: center;"><h1><?= $Articles_titre?></h1></a>
      <img src="../Bet/miniatures/<?= $id ?>.jpg" style="margin-left: 160px" width="800px"/><br/><br><br>
      
      <p><?php  $parser->parse($Articles_contenu);
      echo $parser->getAsHtml(); ?></p>
         </div>
      </section>
<br><br><br><br>
      </main>
   
        </div>
       <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div style="font-weight: bold;" class="text-center my-auto copyright"><strong>Copyright © BETWEENATNA 2019 <br><br>
                Powered by SIKA SOFTWARE</strong></div>
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