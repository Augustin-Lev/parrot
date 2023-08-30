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
        require_once "views/header.php";
        require_once "views/bandeau.php";
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
       
        require_once "views/login.php";
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function verification(){

        $employee = new Employee($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);

        $user = $employee->verifyPassword(htmlentities($_POST['id']),htmlentities($_POST['mdp']));
        if ($user != 0 ){
            // echo "mot de passe correct";
            // var_dump ($user);
       
            $_SESSION["login"] = 1;
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["statut"] = $user["statut"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["succes"] = "Vous êtes bien connecté";
            var_dump($_SESSION);
            // require 'views/login.php';
            header('Location:'.BASE_URL."/");

        }else{
            $_SESSION["login"] = 0;
            $_SESSION["statut"] = "visiteur";
            $_SESSION["erreur"] = "mot de passe incorrecte";
            header('Location:'.BASE_URL."/login");
        }    
    }
    public function mpdOublie(){
        $DB = new DataBase;
        $header = [
            "javascript"=>0,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require "views/login-forget.php";

        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function envoyerCode(){
        $code = new Code;
        if ($code->envoyer(htmlentities($_POST["mail"]))){
            $DB = new DataBase;
            $header = [
                "javascript"=>0,
                "titre"=>"Se connecter Garrage V.Parrot",
                "content"=>"
                Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
                "]; //necessaire au header de model
            require "models/Header.php";
            require_once "views/header.php";
            require "views/login-sent.php";
            $horaire =  $DB->allTimeTable(); // necessaire pour le footer
            require_once "views/footer.php";
        }else{
            $_SESSION["erreur"] = ("Votre mail n'est pas dans la base");
            header('Location:'.BASE_URL."/login");
        }
       
    }
    public function verifierCode(){
        $DB = new DataBase();
        $code = new Code;
        $header = [
            "javascript"=>1,
            "titre"=>"Se connecter Garrage V.Parrot",
            "content"=>"
            Connectez-vous à votre compte administrateur pour gerer les témoignages, les voitures d'occasions et ainsi que les horraires.
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        if ($code->verifier(htmlentities($_POST["verif"])) == 1){
            require "views/login-new.php";
        }else{
            require_once "views/bandeau.php";
            erreur("le code n'est pas bon");
            require "views/login-sent.php";
        }
        echo '<script src="../views/script/login.js"></script>';
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function nouveauMdp(){
        if($_POST["action"]=="nouveau-mpd"){
            $employee = new Employee($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
            $employee-> newPassword($_SESSION["mail"],htmlentities($_POST["mdp"]));
            header('Location:'.BASE_URL."/login");
        }
    }
       
}