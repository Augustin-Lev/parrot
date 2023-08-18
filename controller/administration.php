<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        
        <title>Administration Parrot</title>
        <meta name= "description" content="
        Administration, do not import on web.
        ">
    </head>

    <body >
       
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        require "../view/bandeau.php";

        $Commentaires = allCommentaires($PDO);
        $occasions = occasion($PDO,"1");
        $allOccasions = allOccasions($PDO);
        if (isset($_POST["action"])){
            if($_POST["action"] == "new-salarie"){
                require "../view/new-salarie.php";
            }
            if($_POST["action"] == "ajout-new-employe"){
                AjouterEmploye($PDO, $_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"]);
            }
            if($_POST["action"] == "ajout-new-occasion"){
                $newOccasion = array();
                foreach($_POST as $param){
                    if (key($_POST) != "ajout-new-occasion"){
                        $newOccasion[key($_POST)] = $param;
                    }
                    next($_POST);
                }    
                // var_dump($newOccasion);
              
                AjouterOccasion($PDO, $newOccasion);
                echo("<meta http-equiv='refresh' content='1'>"); 
                require_once "../view/administration.php";
            }
            if($_POST["action"] == "supprimerOccasion"){
                supprimerOccasion($PDO, $_POST["id"]);
                bandeau("Voiture ".$_POST["id"]." bien supprimée");
                require_once "../view/administration.php";
            }
            if($_POST["action"] == "modifierOccasion"){
                $voiture = occasion($PDO, $_POST["id"]);
                require_once "../view/new-occasion.php";
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
           
        }
        if (isset($_POST["action"])){
            if($_POST["action"] == "new-occasion"){
                require "../view/new-occasion.php";
            }
        }else{
            require_once "../view/administration.php";
        }
      
        require "../view/footer.php";
    ?>
    <script src="../model\code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="../model/submitHorraire.js"></script>
  </body>

</html>
