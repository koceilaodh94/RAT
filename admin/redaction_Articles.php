<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=mydb;charset=utf8", "root", "");

Require_once ('JBBCode/Parser.php');

$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['Article_titre'], $_POST['Categories'], $_POST['Article_description'], $_POST['Article_contenu'])) {
   if(!empty($_POST['Article_titre']) AND !empty($_POST['Categories']) AND !empty($_POST['Article_contenu']) AND !empty($_POST['Article_description'])) {
      
      $Articles_titre = htmlspecialchars($_POST['Article_titre']);
      $Articles_Categories = htmlspecialchars($_POST['Categories']);
      $Articles_description = htmlspecialchars($_POST['Article_description']);
      $Articles_contenu = htmlspecialchars($_POST['Article_contenu']);
      
      if($mode_edition == 0) {
         // var_dump($_FILES);
         // var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));
         $ins=$bdd->prepare('INSERT INTO articles (titre, Categorie, description, contenu, date_time_publication, date_time_edition) VALUES (?, ?, ?, ?, NOW(), NOW())');
         $ins->execute(array($Articles_titre, $Articles_Categories, $Articles_description, $Articles_contenu));
         $lastid = $bdd->lastInsertId();


          $ins=$bdd->prepare('INSERT INTO article_populaire (id_article_populaire, compteur) VALUES (?, ?)');
         $ins->execute(array($lastid,'0'));

         if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
            if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
               $chemin = '../Rat/assets/miniatures/'.$lastid.'.jpg';
               
               move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
            } else {
               $message = 'Votre image doit être au format jpg';
            }
         }
         $message = 'Votre article a bien été posté';
          echo '<span style="color: green; align: center; margin-left: 600px">'.$message.'</span>';
      } else {
         $update = $bdd->prepare('UPDATE articles SET titre = ?, Categorie = ?, description = ?, contenu = ?, date_time_publication = NOW(), date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($Articles_titre, $Articles_Categories, $Articles_description, $Articles_contenu, $edit_id));
         header('Location: http://localhost/admin/article-admin.php?id='.$edit_id);
         header('Location: http://localhost/bet/index.php?id='.$edit_id);
         $message = 'Votre article a bien été mis à jour !';
         echo '<span style="color: green; align: center; margin-left: 600px">'.$message.'</span>';

      }
   } else {
         $message = 'Veuillez remplir tous les champs';
         echo '<span style="color: red; align: center; margin-left: 600px">'.$message.'</span>';

   }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>page de redaction</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<script src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="theme/default/wbbtheme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/jquery.wysibb.min.js"></script>
    
    <script src="js/jquery.wysibb.fr.js"></script>
    <script>
$(function() {
  var optionsWbb = {
   buttons: "bold,|,italic,|,underline,|,justifycenter,|,img,|,link,|,code,|,quote,|,fontcolor,fontsize,|,fontfamily",
   lang: "fr",
   allButtons: {
       monbouton: {
         title: 'Bouton Custom',
         buttonText: 'MON BOUTON',
         transform: {
           '<div class="maclasscustom">{SELTEXT}</div>':'[monbouton]{SELTEXT}[/monbouton]'
         }
       }
   }
  }
  $("#wysibb").wysibb(optionsWbb);
})
</script>

</head>

<body id="page-top">
    <div id="wrapper">
       <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"style= "background-image: url(assets/img/Log.jpg);opacity: 0.9">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>Reponse a tout !</span></div>
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
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                           
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Recherche...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                        
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">                        
                            </li>
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
            <div class="container-fluid" style="text-align: center;">

                <form method="POST" enctype="multipart/form-data">
                   
                   <input type="text" name="Article_titre" style="width: 100% ; font-weight: bold ; margin-left: 5px" placeholder="Titre"
                   <?php if($mode_edition == 1) { ?>
                    value="<?= $edit_article['titre'] ?>"
                    <?php } ?>/><br />
                      

               <label style="font-weight: bold ; margin-left: -60px" >Choisir la Categorie </label><br>
                    <span class="custom-dropdown custom-dropdown--white">
                    <SELECT class="custom-dropdown__select custom-dropdown__select--white" type="" name="Categories" size="1" style="width: 100%  ; font-weight: bold">
                         <OPTION Values=""></OPTION>
                         <OPTION Values="Actualité">Actualité</OPTION>
                         <OPTION Values="Vie Pratique">Vie Pratique</OPTION>
                         <OPTION Values="Santé et Bien etre">Santé et Bien etre</OPTION>
                         <OPTION Values="Consomation">Consomation</OPTION>
                         <OPTION Values="Astuces">Astuces</OPTION>
                         <OPTION Values="Arnaques">Arnaques</OPTION>
                         <OPTION Values="Autres">Autres</OPTION>
                    </SELECT>
                    </span>

                   <textarea name="Article_description" placeholder="description" style="width: 100%" <?php if($mode_edition == 1) { ?><?= $edit_article['description'] ?><?php } ?>></textarea><br>

                   <textarea id="wysibb" name="Article_contenu" placeholder="Contenu" style="width: 100% ; height: 500px;"<?php if($mode_edition == 1) { ?><?= $edit_article['contenu'] ?><?php } ?>></textarea><br /><br>
                   <?php if($mode_edition == 0) { ?>
                   <input type="file" name="miniature"style="font-weight: bold"/><br/>
                    <?php } ?> <br><br>
                  <input type="submit" value="Envoyer l'article" style="font-weight: bold">
                </form>
                <br />
                <?php if(isset($message)) { echo $message; } ?>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div style="font-weight: bold;" class="text-center my-auto copyright"><strong>Copyright © BETWEENATNA 2019 <br><br>
                Powered by SIKA SOFTWARE</strong></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
