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
        
        if(isset($_POST["message"])){
            $employes = allEmploye($PDO);
            foreach($employes as $employe){
                if ($employe["statut"] == "patron"){
                    $message = "nom : ".$_POST["nom"]."<br/> prenom : ".$_POST["prenom"]."<br/> tel : ".$_POST["tel"]."<br/> message : ".$_POST["message"];
                    if(isset($_POST["sujet"])){
                        $sujet = $_POST["sujet"];
                    }else{
                        $sujet = "Message Client Site Internet";
                    }   
                    mail($employe["email"],$sujet,$message);
                }
            }
            bandeau("le message a bien été envoyé");
        }
        require_once "../view/index.php";
      
       
        require "../view/footer.php";
    ?>
  </body>

</html>
