<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <title>Administration Garage V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Administration, do not import on web.
        ">
    </head>

    <body >
       
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        require "../view/bandeau.php";
        if ( !$_SESSION["login"] ){
            header("Location:../controller/index.php");
        }
        $Commentaires = allCommentaires($PDO);
        $occasions = occasion($PDO,"id IS NOT NULL");
        $allOccasions = allOccasions($PDO);
        if (isset($_POST["action"])){
            if($_POST["action"] == "new-salarie"){
                require "../view/new-salarie.php";
            }
            if($_POST["action"] == "ajout-new-employe"){
                AjouterEmploye($PDO, $_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"]);
            }
            if($_POST["action"] == "ajout-new-occasion"){
                var_dump($_FILES);
                $newOccasion = array();
                foreach($_POST as $param){
                    if (key($_POST) != "ajout-new-occasion"){
                        $newOccasion[key($_POST)] = $param;
                    }
                    next($_POST);
                }    
                // var_dump($newOccasion);
              
                AjouterOccasion($PDO, $newOccasion);
                // echo("<meta http-equiv='refresh' content='1'>"); 
                // require_once "../view/administration.php";
            }
            if($_POST["action"] == "supprimerOccasion"){
                supprimerOccasion($PDO, $_POST["id"]);
                bandeau("Voiture ".$_POST["id"]." bien supprimée");
                require_once "../view/administration.php";
            }
            if($_POST["action"] == "modifierOccasion"){
                if($_POST["id"]!=""){
                    $voiture = occasion($PDO, $_POST["id"]);
                    require_once "../view/new-occasion.php";
                }else{
                    erreur("il faut choisir une voiture avant de la modifier ;)");
                    require_once "../view/administration.php";
                }
               
            }

            if($_POST["action"] == "changerHoraire"){
                $horaires=$_POST;
                // var_dump($horaires);
                changerHoraire($PDO, $horaires);
                require_once "../view/administration.php";
                
            }
            if($_POST["action"] == "validerTemoignage"){
                validerTemoignage($PDO, $_POST["id"], $_POST["valide"]);
                echo("<meta http-equiv='refresh' content='1'>");
            }
            if($_POST["action"] == "new-occasion"){
                require "../view/new-occasion.php";
            }
            if($_POST["action"] == "ajouterChamp"){
                ajouterChamp($PDO,$_POST["champ"],"occasion",$_POST["name"]);
                bandeau("le champ ".$_POST["name"]." a bien été ajouté");
            }
           
        }else{
            if (isset($_GET["action"])){
                require "../view/newFiel.php";
            }else{
                require_once "../view/administration.php";
            }
        }
      
        require "../view/footer.php";
    ?>
    <script src="../model\code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="../model/submitHorraire.js"></script>
  </body>

</html>
