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

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        $Commentaires = allCommentaires($PDO);
        if (isset($_POST["action"])){
            if($_POST["action"] == "new-salarie"){
                require "../view/new-salarie.php";
            }
            if($_POST["action"] == "ajout-new-employe"){
                AjouterEmploye($PDO, $_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"]);
            }
        }
        require_once "../view/administration.php";
        require "../view/footer.php";
    ?>
  </body>

</html>
