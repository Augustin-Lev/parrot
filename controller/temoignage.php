<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <title>Témoignage Parrot</title>
        <meta name= "description" content="
        Les clients donnent leur avis objectif sur la qualité de notre garage. Noté 5 étoiles sur google notre garage prends soin de ses clients.
        ">
    </head>

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        require "../view/bandeau.php";

        $commentaire = allCommentaires($PDO);
        if (isset($_POST["action"])){
            if ($_POST["action"]=="newTemoignage"){
                require "../view/new-temoignage.php";
            }
            if ($_POST["action"]=="enregistrer"){
                nouveauTemoignage($PDO, $_POST["valide"], $_POST["Nom"], $_POST["prenom"], $_POST["Etoile"], $_POST["commentaire"]);
                bandeau("Votre témoignage a bien été ajouté");
                require_once "../view/temoignage.php";
            }
            
        }else{
            require_once "../view/temoignage.php";
        }
        
        require "../view/footer.php";
    ?>
  </body>

</html>
