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

        session_start();

        echo "POST";
        var_dump($_POST);
        echo "SESSION";
        var_dump($_SESSION);

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
                newMdp($_SESSION["mail"],$_POST["mdp"]);
                // require "../view/index.php";
                
            }
            
        }

        if (isset($_GET["login"])){
            if($_GET["login"]=="forget"){
                require "../view/login-forget.php";
               
            }
            if($_GET["login"]=="verif"){

            
                if (VerifierMdpBdd($PDO,$_POST['id'],$_POST['mdp'])){
                    echo "mot de passe correct";
                }else{
                    echo "mot de passe incorrecte";
                }             
               
            }
            
        }else{
            require "../view/login.php";
        }
      
        require "../view/footer.php";
    ?>
  </body>

</html>
