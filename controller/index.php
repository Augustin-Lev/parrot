<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
       
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <link rel="stylesheet" href="..\style\stylesheet-tel.css">
        <title>Garrage Toulousain V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
        La performance et la sécurité à porté de main.
        ">
    </head>

    <body>
    <?php
        require "../model/Bdd.php";
        require "../view/bandeau.php";
        require "../view/header.php";
       
        $TroisCommentaires = TroisCommentaires($PDO);
        if(isset($_GET["action"])){
            if($_GET["action"]=='unlog'){
                $_SESSION["login"] = 0;
                $_SESSION["nom"] = "";
                $_SESSION["prenom"] = "";
                $_SESSION["statut"] = "";
                $_SESSION["email"] = "";
                bandeau("Vous êtes bien déconnecté");
            }
        }
        require_once "../view/index.php";
        if(isset($_POST["message"])){
            $employes = allEmploye($PDO);
            foreach($employes as $employe){
                if ($employe["statut"] == "patron"){
                    $message = "nom : ".$_POST["nom"]."<br/> prenom : ".$_POST["prenom"]."<br/> tel : ".$_POST["tel"]."<br/> message : ".$_POST["message"];
                    mail($employe["email"],"Message Client Site Internet",$message);
                }
            }
            bandeau("le message a bien été envoyé");
        }
      
       
        require "../view/footer.php";
    ?>
  </body>

</html>
