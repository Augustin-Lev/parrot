<?php

class HomeController {
    public function index(){
        $header = [
            "javascript"=>0,
            "titre"=>"Garrage Toulousain V.Parrot",
            "content"=>"Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require_once "views/bandeau.php";

        //Lancement de la connexion à la base de donnée
        $DB = new DataBase();
        $TroisCommentaires = $DB->threeTestimonials();
        if(isset($_SESSION["succes"])){
            if ($_SESSION["succes"] != ""){
                bandeau($_SESSION["succes"]);
                unset($_SESSION["succes"]);
            }
        }
        if (isset($_SESSION["erreur"])){
            if ($_SESSION["erreur"] != ""){
                erreur($_SESSION["erreur"]);
                unset($_SESSION["erreur"]);
            }
        }

        require_once "views/index.php";
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function unlog(){

        $_SESSION["login"] = 0;
        $_SESSION["nom"] = "";
        $_SESSION["prenom"] = "";
        $_SESSION["statut"] = "";
        $_SESSION["email"] = "";
        $_SESSION["succes"] = "Vous êtes bien déconnecté !";

        header("Location:".BASE_URL."/");

    }
    public function message(){
        $DB = new DataBase();

        $TroisCommentaires = $DB->threeTestimonials();
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
            $liste = $DB->mailGestion();
            $visitor = new Visitor(htmlentities($_POST["nom"]),htmlentities($_POST["prenom"]));
            $visitor->setEmail(htmlentities($_POST["mail"]));
            $visitor->setPhone(htmlentities($_POST["tel"]));
            
            $visitor->sendMessage(htmlentities($_POST["message"]));
            bandeau("le message a bien été envoyé");
        }

        require_once "views/index.php";
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }
    public function privacyPolicy(){
        $DB = new DataBase();
        $TroisCommentaires = $DB->threeTestimonials();
        $header = [
            "javascript"=>0,
            "titre"=>"Garrage Toulousain V.Parrot",
            "content"=>"
            Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
            "]; //necessaire au header de model
        require "models/Header.php";
        
        require_once "views/bandeau.php";
        require_once "views/header.php";
        require_once "views/privacyPolicy.php";
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";

    }
}
?>