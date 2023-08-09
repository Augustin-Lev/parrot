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
        
        require_once "../view/administration.php";
        require "../view/footer.php";
    ?>
  </body>

</html>
