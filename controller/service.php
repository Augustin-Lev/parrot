<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <title>Services Parrot</title>
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
