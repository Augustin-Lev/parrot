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
        if(isset($_POST["service"])){
                modifierService($PDO, $_POST["service"], $_POST["content"]);
                header("Location: ../controller/index.php");
            
        }else{  
            require "../view/modif-Service.php";

        }
      
        
        require "../view/footer.php";
    ?>
  </body>

</html>
