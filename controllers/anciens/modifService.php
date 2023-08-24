<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <title>Administration Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Administration, do not import on web.
        ">
    </head>

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";  
        if(isset($_POST["service"])){
                modifierService($PDO, $_POST["service"], $_POST["content"],$_POST['titre']);
                header("Location: ../controller/service.php");
            
        }else{  
            require "../view/modif-Service.php";

        }
      
        
        require "../view/footer.php";
    ?>
  </body>

</html>
