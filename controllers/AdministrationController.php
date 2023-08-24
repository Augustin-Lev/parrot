<?php 

class AdministrationController{
    public function index(){
        if ( !$_SESSION["login"] ){
            header("Location:../controller/index.php");
        }
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer

        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require_once "views/bandeau.php";
        require_once "views/header.php";
   
        $Commentaires = $DB->allCommentaires();
        $occasions = $DB->occasion("id IS NOT NULL");
        $allOccasions = $DB->allOccasions();

        require_once "views/administration.php";
        
        require_once "views/footer.php";
    }
    public function reboot(){
        require_once "models/ancien/init.php";
    }

    public function newEmployee(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require "../view/new-salarie.php";
       
        require_once "views/footer.php";
    }
  
    public function addNewEmployee(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        $DB->AjouterEmploye($PDO, $_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"]);
        require_once "../view/administration.php";
       
        require_once "views/footer.php";
    }

    public function addNewCar(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        // var_dump($_FILES);
        $newOccasion = array();
        foreach($_POST as $param){
            if (key($_POST) != "ajout-new-occasion"){
                $newOccasion[key($_POST)] = $param;
            }
            next($_POST);
        }    
        // var_dump($newOccasion);
        
        $DB->AjouterOccasion($newOccasion);
        echo("<meta http-equiv='refresh' content='1'>"); 
        // require_once "../view/administration.php";
        require_once "views/footer.php";
    }
    public function delCar(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $DB->supprimerOccasion($_POST["id"]);
        bandeau("Voiture ".$_POST["id"]." bien supprimée");
        require_once "../view/administration.php";

       
        require_once "views/footer.php";

    }
    public function modifyCar(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        if($_POST["id"]!=""){
            $voiture = $DB->occasion($_POST["id"]);
            require_once "../view/new-occasion.php";
        }else{
            erreur("il faut choisir une voiture avant de la modifier ;)");
            require_once "../view/administration.php";
        }

        
        require_once "views/footer.php";
    }
    public function changeTimeTables(){
        $DB = new DataBase();      
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $horaires=$_POST;
        // var_dump($horaires);
        $DB->changerHoraire($horaires);
        require_once "../view/administration.php";

        require_once "views/footer.php";

    }

    private function validateTestimonial(){
        validerTemoignage($PDO, $_POST["id"], $_POST["valide"]);
        echo("<meta http-equiv='refresh' content='1'>");
    }
    
    private function newCar(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        
        require "../view/new-occasion.php";
        
       
        require_once "views/footer.php";
    }

    public function newField(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $DB->ajouterChamp($_POST["champ"],"occasion",$_POST["name"]);
        bandeau("le champ ".$_POST["name"]." a bien été ajouté");
        require_once "../view/administration.php";

       
        require_once "views/footer.php";
    }

}