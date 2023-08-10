<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <title>Garrage Parrot</title>
        <meta name= "description" content="
        Page de connexion
        ">
    </head>
    <body>
    <?php
        require "../model/Bdd.php";
        require "../model/sendcode.php";
        require "../view/header.php";

     


        if (isset($_POST["action"])){
            
            if($_POST["action"]=="envoyer"){
                envoyer($_POST["mail"]);
                require "../view/login-sent.php";
                
            }
            if($_POST["action"]=="verifier"){
                if (verifier($_POST["verif"]) == 1){
                    require "../view/login-new.php";
                }else{
                    echo '<script>alert("le code n est pas bon") </script>';
                    require "../view/login-sent.php";
                }
            }
            if($_POST["action"]=="nouveau-mpd"){
                newMdp($PDO, $_SESSION["mail"],$_POST["mdp"]);
                // require "../view/index.php";
                
            }
            
        }

        if (isset($_GET["login"])){
            if($_GET["login"]=="forget"){
                require "../view/login-forget.php";
               
            }
            if($_GET["login"]=="verif"){

                $user = VerifierMdpBdd($PDO,$_POST['id'],$_POST['mdp']);
                if ($user != 0 ){
                    // echo "mot de passe correct";
                    // var_dump ($user);
                    $_SESSION["login"] = 1;
                    $_SESSION["nom"] = $user["nom"];
                    $_SESSION["prenom"] = $user["prenom"];
                    $_SESSION["statut"] = $user["statut"];
                    
                    header('Location:../controller/index.php');

                }else{
                    // echo "mot de passe incorrecte";
                    $_SESSION["login"] = 0;
                    $_SESSION["statut"] = "visiteur";
                    header('Location:../controller/index.php');
                }             
               
            }
            
        }elseif(isset($_POST["action"]) == 0){
            require "../view/login.php";
        }
      
        require "../view/footer.php";
    ?>
  </body>

</html>
