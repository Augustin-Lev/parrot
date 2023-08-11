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
        $commentaire = allCommentaires($PDO);
        require_once "../view/temoignage.php";
        require "../view/footer.php";
    ?>
  </body>

</html>
