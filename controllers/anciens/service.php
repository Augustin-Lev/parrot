<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <title>Services Garage V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Principalement axé sur la réparation de carroserie, la mécanique et les controles techniques, 
        le garrage parrot vous propose un service de qualité d'une efficacité hors norme.
        ">
    </head>

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        require_once "../view/services.php";
        require "../view/footer.php";
    ?>
  </body>

</html>
