
<?php
session_start();
include_once('includes.php');


 // S'il y a une session alors on ne retourne plus sur cette page  
if(isset($_SESSION['id']) and $_SESSION['gendre'] == 'P'){
    header('Location: espace-proprietaire.php');
    exit;
}
if(isset($_SESSION['id']) and $_SESSION['gendre']=='C'){
    header('Location: espace-concierge.php');
    exit;
}



    $selected_gendre='';
    function get_radion_buttons($select) {
        $btns = array('Homme' =>'P' ,'Femme'=>'C');    
        $str='';
        while (list($k,$v)=each($btns)) {
            if ($select==$v) {
                $str.='<input type="radio"  name="gendre[]" required="" value="'.$v.'"/>&nbsp;&nbsp;'.$k; 
            } else {
                $str.='&nbsp;&nbsp;<input type="radio"  name="gendre[]" required="" value="'.$v.'"/>&nbsp;&nbsp;'.$k;
            }
            
            
        }
        return $str;
    }

if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    $selected_gendre = $_POST['gendre'][0];
    $Mail = htmlspecialchars(trim($Mail));
    $Password = trim($Password);
        
    if (empty($selected_gendre)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez choisir votre Catégorie !";
    }
    if(empty($Mail)){
        $valid = false;
        $_SESSION['flash']['warning'] = "Veuillez renseigner votre mail !";
    }
    
    if(empty($Password)){
        $valid = false;
        $error_password = "Veuillez renseigner un mot de passe !";
    }
    
    
    $req = $DB->query('Select * from users where mail = :mail and password = :password and gendre = :gendre' , array('mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'), 'gendre' => $selected_gendre));
    $req = $req->fetch();
        
    if(!$req['mail']){
        $valid = false;
        $_SESSION['flash']['danger'] = "Votre mail ou mot de passe ne correspondent pas";
    }
    
    
    if($valid){
        if ($req['gendre'] == 'P') {
        $_SESSION['gendre'] = $req['gendre'];
        $_SESSION['id'] = $req['idpublic'];
        $_SESSION['nomUser'] = $req['nomUser'];
        $_SESSION['prenomUser'] = $req['prenomUser'];
        $_SESSION['mail'] = $req['mail'];
        $_SESSION['password'] = $req['password'];
        $_SESSION['avatar'] = $req['avatar'];
        
        header('Location: espace-proprietaire.php');
        exit;
            
        }elseif ($req['gendre'] == 'C') {
        $_SESSION['gendre'] = $req['selected_gendre'];
        $_SESSION['id'] = $req['idpublic'];
         $_SESSION['nomUser'] = $req['nomUser'];
        $_SESSION['prenomUser'] = $req['prenomUser'];
        $_SESSION['mail'] = $req['mail'];
        $_SESSION['password'] = $req['password'];
        $_SESSION['avatar'] = $req['avatar'];
        
        header('Location: espace-concierge.php');
        exit;
            
        }

    }
    
}   
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>se connecter</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="assets/css/DashBoard-light-boostrap-1.css">
    <link rel="stylesheet" href="assets/css/DashBoard-light-boostrap-2.css">
    <link rel="stylesheet" href="assets/css/DashBoard-light-boostrap-4.css">
    <link rel="stylesheet" href="assets/css/DashBoard-light-boostrap-3.css">
    <link rel="stylesheet" href="assets/css/4-Col-Small-Slider.css">
    <link rel="stylesheet" href="assets/css/canitoLogin.css">
    <link rel="stylesheet" href="assets/css/DashBoard-light-boostrap.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Media-Slider-Bootstrap-3-1.css">
    <link rel="stylesheet" href="assets/css/Media-Slider-Bootstrap-3.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">
    
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

    <div class="login-clean">
            <button type="button" class="close" aria-label="Close" onclick="self.location.href='home.php'" style="width: 80px;height: 80px;position: fixed;top: 0px;left: 1455px;">
        <span aria-hidden="true" style="width: 50px;height: 50px;">&times;</span>
    </button><br>
        <form method="post" action="">
            <h3 class="text-center">Se connecter à mon compte</h3>


            <div class="illustration">
                <i class="icon ion-ios-navigate"></i>
            </div>


                <div class="form-group">
                        <?php
                            if(isset($error_usercategorie)){
                                echo $error_usercategorie."<br/>";

                            } 
                              echo get_radion_buttons($selected_gendre);  
                        ?>

                </div>
            <div class="form-group">
                <input class="form-control" type="email" name="Mail" placeholder="Mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">
            </div>
            <div class="form-group">

                        <?php
                            if(isset($error_password)){
                                echo $error_password."<br/>";
                            }   
                        ?>


                <input class="form-control" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                Connexion
                </button>
            </div>
            <a class="forgot" href="inscription.php">je n'ai pas encore de compte !</a>
            <a class="forgot" href="#">Mot de passe oublié?</a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/DashBoard-light-boostrap-2.js"></script>
    <script src="assets/js/DashBoard-light-boostrap.js"></script>
    <script src="assets/js/DashBoard-light-boostrap-1.js"></script>
    <script src="assets/js/DashBoard-light-boostrap-4.js"></script>
    <script src="assets/js/DashBoard-light-boostrap-3.js"></script>
    <script src="assets/js/Media-Slider-Bootstrap-3.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
</body>

</html>