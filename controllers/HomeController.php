<?php

class HomeController {
    public function index(){
        $header = [
            "javascript"=>0,
            "titre"=>"Garrage Toulousain V.Parrot",
            "content"=>"Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "models/User.php";
        require_once "views/header.php";
        require_once "views/bandeau.php";

        //Lancement de la connexion à la base de donnée
        $DB = new DataBase();

        $TroisCommentaires = $DB->TroisCommentaires();
        if(isset($_SESSION["succes"])){    
            bandeau($_SESSION["succes"]);
            unset($_SESSION["succes"]);
        }
        if (isset($_SESSION["erreur"])){
            erreur($_SESSION["erreur"]);
            unset($_SESSION["erreur"]);
        }

        require_once "views/index.php";
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function unlog(){

        $_SESSION["login"] = 0;
        $_SESSION["nom"] = "";
        $_SESSION["prenom"] = "";
        $_SESSION["statut"] = "";
        $_SESSION["email"] = "";
        $_SESSION["succes"] = "Vous êtes bien déconnecté !";

        header("Location:".BASE_URL);
    }
    public function message(){
        $DB = new DataBase();
        $TroisCommentaires = $DB->TroisCommentaires();
        $header = [
            "javascript"=>0,
            "titre"=>"Garrage Toulousain V.Parrot",
            "content"=>"
            Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
            "]; //necessaire au header de model
        require "models/Header.php";
        
        require_once "views/bandeau.php";
        require_once "views/header.php";

        if(isset($_POST["message"])){
            $employes = $DB->allEmploye();
            foreach($employes as $employe){
                if ($employe["statut"] == "patron"){
                    $message = "nom : ".htmlentities($_POST["nom"])."<br/> prenom : ".htmlentities($_POST["prenom"])."<br/> tel : ".htmlentities($_POST["tel"])."<br/> message : ".htmlentities($_POST["message"]);
                    if(isset($_POST["sujet"])){
                        $sujet = htmlentities($_POST["sujet"]);
                    }else{
                        $sujet = "Message Client Site Internet";
                    } 
                    mail($employe["email"],$sujet,$message);
                }
            }
            bandeau("le message a bien été envoyé");
        }

        require_once "views/index.php";
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }
}
?>