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
        $Commentaires = allCommentaires($PDO);
        $occasions = occasion($PDO,"1");
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
                require_once "../view/administration.php";
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
  </body>

</html>
