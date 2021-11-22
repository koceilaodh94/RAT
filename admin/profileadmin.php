<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=mydb', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM administrateur WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profil - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="page-top" >
    <div id="wrapper" >
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"style= "background-image: url(assets/img/Log.jpg);opacity: 0.9">
            <div class="container-fluid d-flex flex-column p-0" >
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" >
                    
                    <div class="sidebar-brand-text mx-3"><span>BETWEENATNA</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    

                    <li class="nav-item" role="presentation"><a class="nav-link active" href=""><i class="fas fa-tachometer-alt"></i><span>Accueil</span></a></li>

                     <li class="nav-item" role="presentation"><a class="nav-link" href="parametre-profil.php"><i class="fas fa-user"></i><span>Profil</span></a></li>
                   
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
                               
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Messagerie</h6>
                                    </div>
                                </li>
                               
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span><img src="assets/img/computer.jpg" class="border rounded-circle img-profile"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="admin_deconnexion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Deconnexion</a></div>
                    </li>
                    </li>
                    </ul>
            </div>
            </nav>

               
      <div align="center" >
         <div style="font-weight:bold"> <h2>Profil de <?php echo $userinfo['prenom']; ?> <?php echo $userinfo['nom']; ?></h2> </div> 
         <br />
         <br />
         <div style="font-weight:bold"><?php echo $userinfo['mail']; ?> </div>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="parametre-profil.php">Editer mon profil</a>
        
         <?php
         }
         ?>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div style="font-weight: bold;" class="text-center my-auto copyright"><strong>Copyright © BETWEENATNA 2019 <br><br>
                Powered by SIKA SOFTWARE</strong></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>
<?php 
}
?>
