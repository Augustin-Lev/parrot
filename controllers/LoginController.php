<?php 

class LoginController{
    public function index(){
        
        $DB = new DataBase();
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        
        require_once "models/User.php";
   
        
        require_once "views/header.php";
       
        require_once "views/login.php";
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
        
       
    }
    public function verification(){
        //Lancement de la connexion à la base de donnée
        $DB = new DataBase();
        $user = $DB->VerifierMdpBdd($_POST['id'],$_POST['mdp']);
        if ($user != 0 ){
            // echo "mot de passe correct";
            // var_dump ($user);
       
            $_SESSION["login"] = 1;
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["statut"] = $user["statut"];
            $_SESSION["email"] = $user["email"];
            var_dump($_SESSION);
            require 'views/login.php';
            // header('Location:'.BASE_URL);

        }else{
            require_once "views/bandeau.php";
            erreur("mot de passe incorrecte");
            $_SESSION["login"] = 0;
            $_SESSION["statut"] = "visiteur";
            require 'views/login.php';
        }    
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "models/User.php";

        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }
    public function mpdOublie(){
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require "../view/login-forget.php";
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function envoyerCode(){
        $DB = new DataBase();
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        if ($DB->envoyer($_POST["mail"])){
            require "../view/login-sent.php";
        }else{
            require_once "views/bandeau.php";
            erreur("Votre mail n'est pas dans la base");
            require 'views/login.php';
        }
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }
    public function verifierCode(){
        $DB = new DataBase();
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        if ($DB->verifier($_POST["verif"]) == 1){
            require "views/login-new.php";
        }else{
            require_once "views/bandeau.php";
            erreur("le code n'est pas bon");
            require "views/login-sent.php";
        }

        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function nouveauMdp(){
        if($_POST["action"]=="nouveau-mpd"){
            $DB = new DataBase();
            $DB-> newMdp($PDO, $_SESSION["mail"],$_POST["mdp"]);
            header('Location:/');
        }
    }
       
}