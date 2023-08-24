<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <link rel="stylesheet" href="..\style\carroussel.css">
        <link rel="stylesheet" href="../style\jquery-ui.theme.css">
        <link rel="stylesheet" href="../style\jquery-ui.structure.css"> 
        <title>Véhicule d'occasions V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Quelque soit votre budget, nous vous proposons tous types de voitures d'occasions !
        Filtrez par prix, kilolétrage ou année de mise en service pour affiner vos recherches. 
        Une page d'informations détaillé vous est proposé pour chaque véhicule, il n'y a plus qu'à reserver !
        ">
    </head>

    <body>
        <script src="../model\code.jquery.com_jquery-3.7.0.min.js"></script>
        <script src="../model\jquery-ui.min.js"></script>
        <script src="../model/filtreOccasions.js"></script>
       
    <?php
        require "../model/Bdd.php";
        require "../model/sendcode.php";
        require "../view/bandeau.php";
        require "../view/header.php";
        
      
        require "../view/footer.php";
    ?>
   
  </body>

</html>
