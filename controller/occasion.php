<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="../style\jquery-ui.theme.css">
        <link rel="stylesheet" href="../style\jquery-ui.structure.css"> 
        <title>Garrage Parrot</title>
        <meta name= "description" content="
        Du presque neuf au peu cher, nous vous proposons tous types de voitures d'occasions !
        ">
    </head>

    <body>
        <script src="../model\code.jquery.com_jquery-3.7.0.min.js"></script>
        <script src="../model\jquery-ui.min.js"></script>
        <script src="../model/filtreOccasions.js"></script>
       
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        if (isset($_GET["voiture"])){
            $voiture= occasion($PDO, $_GET["voiture"]);
            require_once "../view/occasionPlus.php";
        }else{
            $occasions= allOccasions($PDO);
            require_once "../view/occasion.php";      
        }
       
        require "../view/footer.php";
    ?>
   
  </body>

</html>
