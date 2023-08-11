<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <title>Garrage Parrot</title>
        <meta name= "description" content="
        Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
        La performance et la sécurité à porté de main.
        ">
    </head>

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/header.php";
        $TroisCommentaires = TroisCommentaires($PDO);
        require_once "../view/index.php";
        if(isset($_POST["message"])){
            $employes = allEmploye($PDO);
            foreach($employes as $employe){
                if ($employe["statut"] == "patron"){
                    $message = "nom : ".$_POST["nom"]."<br/> prenom : ".$_POST["prenom"]."<br/> tel : ".$_POST["tel"]."<br/> message : ".$_POST["message"];
                    mail($employe["email"],"Message Client Site Internet",$message);
                }
            }
            echo "<script>alert('le message a bien été envoyé') </script>";
        }
       
        require "../view/footer.php";
    ?>
  </body>

</html>
