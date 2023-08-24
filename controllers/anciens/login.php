<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <title>Se connecter Garrage V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
        ">
    </head>
    <body>
    <?php
        require "../model/Bdd.php";
        require '../view/bandeau.php';
        require "../model/sendcode.php";
        require "../view/header.php";

    
        if (isset($_POST["action"])){
            
            if($_POST["action"]=="envoyer"){
                
                if (envoyer($PDO,$_POST["mail"])){
                    require "../view/login-sent.php";
                }else{
                    erreur("Votre mail n'est pas dans la base");
                }
                
            }
            if($_POST["action"]=="verifier"){
                if (verifier($_POST["verif"]) == 1){
                    require "../view/login-new.php";
                }else{
                    erreur("le code n'est pas bon");
                    require "../view/login-sent.php";
                }
            }
            if($_POST["action"]=="nouveau-mpd"){
                newMdp($PDO, $_SESSION["mail"],$_POST["mdp"]);
                header('Location:../controller/index.php');
                
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
                    $_SESSION["email"] = $user["email"];
                    header('Location:../controller/index.php');

                }else{
                    erreur("mot de passe incorrecte");
                    $_SESSION["login"] = 0;
                    $_SESSION["statut"] = "visiteur";
                    require '../view/login.php';
                   
                }             
               
            }
            
        }elseif(isset($_POST["action"]) == 0){
            require "../view/login.php";
        }
      
        require "../view/footer.php";
    ?>
    <script src="../model/login.js"></script>
  </body>

</html>
