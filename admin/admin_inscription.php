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
        $btns = array('Homme' =>'H' ,'Femme'=>'F');    
        $str='';
        while (list($k,$v)=each($btns)) {
            if ($select==$v) {
                $str.='<input type="radio"  name="gendre[]" required="" value="'.$v.'"/>&nbsp;&nbsp;'.$k; 
            } else {
                $str.='&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="gendre[]" required="" value="'.$v.'"/>&nbsp;&nbsp;'.$k;
            }
            
            
        }
        return $str;
    }

    
    

if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    
    $selected_gendre = $_POST['gendre'][0];
     $Pseudo = htmlspecialchars(trim($Pseudo));
    $datenaissance = htmlspecialchars(trim($datenaissance));
    $Mail = htmlspecialchars(trim($Mail));
    $Password = trim($Password);
    $PasswordConfirmation = trim($PasswordConfirmation);
    if (empty($selected_gendre)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez choisir votre gendre !";
    }

   if(empty($Pseudo)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez mettre un pseudo !";
    }
    
    $req = $DB->query('Select pseudo from users where pseudo = :pseudo', array('pseudo' => $Pseudo));
    $req = $req->fetch();
    
    if(!empty($Pseudo) && $req['pseudo']){
        $valid = false;
        $_SESSION['flash']['danger'] = "Ce pseudo existe déjà";
        
    }  



     if(empty($datenaissance)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez mettre votre date de naissance !";
    }
    if(empty($Mail)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez mettre un mail !";
    }
    
    $req = $DB->query('Select mail from administrateur where mail = :mail', array('mail' => $Mail));
    $req = $req->fetch();
    
    if(!empty($Mail) && $req['mail']){
        $valid = false;
        $_SESSION['flash']['danger'] = "Ce mail existe déjà";
        
    }
    if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $Mail)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez mettre un mail conforme !";
    }
    
    if(empty($Password)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez renseigner votre mot de passe !";

    }elseif($Password && empty($PasswordConfirmation)){
        $valid = false;
        $_SESSION['flash']['danger'] = "Veuillez confirmer votre mot de passe !";
    
    }elseif(!empty($Password) && !empty($PasswordConfirmation)){
        if($Password != $PasswordConfirmation){
            
            $valid = false;
            $_SESSION['flash']['danger'] = "La confirmation est différente !";
        }
        
    }
        
    if($valid){
        
        $id_public = uniqid();
                     $DB->insert('insert into administrateur (pseudo, datenaissance, dateinscription, mail, password, gendre, idpublic) values (:pseudo, :datenaissance, NOW(), :mail, :password, :gendre, :idpublic)', array('pseudo'=> $Pseudo, 'datenaissance'=> $datenaissance, 'mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'), 'gendre' => $selected_gendre, 'idpublic' => $id_public));


        
        $_SESSION['flash']['success'] = "Votre inscription a bien été prise en compte, connectez-vous !";
        header('Location: admin_connexion.php');
        exit;
        
    }   
}   
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styleinscription.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">


    
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
    <button type="button" class="close" aria-label="Close" onclick="self.location.href='home.php'" style="width: 80px;height: 80px;">
        <span aria-hidden="true" style="width: 50px;height: 50px;">&times;</span>
    </button>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" action="admin_inscription.php">
                <h2 class="text-center"><strong>Créer votre compte</strong></h2>
                
                <div class="form-check">
                        <?php
                            if(isset($error_usercategorie)){
                                echo $error_usercategorie."<br/>";

                            } 
                              echo get_radion_buttons($selected_gendre);  
                        ?>

                </div>
                <br>  
                <div class="form-group" style="margin-top: -16px">

                        <?php
                            if(isset($error_Pseudo)){
                                echo $error_Pseudo."<br/>";
                            }   
                        ?> 
                             <input class="form-control" type="text" name="Pseudo" 
                             placeholder="pseudo" value="<?php if (isset($Pseudo)) echo $Pseudo; ?>" required="required">
                          </div>

                           <div class="form-group"> 

                        <?php
                            if(isset($error_datenaissance)){
                                echo $error_datenaissance."<br/>";
                            }   
                        ?>
                    <input placeholder=" Date de Naissance" name="datenaissance" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php if (isset($datenaissance)) echo $datenaissance; ?>" required="required">
                </div>


                <div class="form-group"> 

                        <?php
                            if(isset($error_mail)){
                                echo $error_mail."<br/>";
                            }   
                        ?>
                    <input class="form-control" type="email" name="Mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">
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

                        <?php
                            if(isset($error_passwordConf)){
                                echo $error_passwordConf."<br/>";
                            }   
                        ?>

                    <input class="form-control" type="password" name="PasswordConfirmation" placeholder="Confirmation du mot de passe" required="required">
                </div>

                <div class="form-group">

                    <div class="form-check">
                        <label class="form-check-label"><input class="form-check-input" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;j'accèpte les condition d'utilisation.</label>
                    </div>
                </div>

                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">s'inscrir</button></div><a href="admin_connexion.php" class="already">avez-vous déja un compte? connectez-vous ici.</a></form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>