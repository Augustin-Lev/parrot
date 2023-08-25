<?php 

class AdministrationController{
    public function index(){
        if ( !$_SESSION["login"] ){
            header("Location:".BASE_URL."/");
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
        require_once "models/Init.php";
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

        require "views/new-salarie.php";

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
        require_once "models/User.php";

        $employee = new User($_POST["email"],$_POST["mdp"],$_POST["nom"],$_POST["prenom"],'salarié');
        $DB->AjouterEmploye($employee);
        $Commentaires = $DB->allCommentaires();
        $occasions = $DB->occasion("id IS NOT NULL");
        $allOccasions = $DB->allOccasions();

        require_once "views/administration.php";
       
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
    
    public function modifyCar(){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $Commentaires = $DB->allCommentaires();
        $occasions = $DB->occasion("id IS NOT NULL");
        $allOccasions = $DB->allOccasions();

        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require_once "views/bandeau.php";

        if($_POST["action"] =="supprimerOccasion"){
            $DB->supprimerOccasion($_POST["id"]);
            bandeau("Voiture ".$_POST["id"]." bien supprimée");
            require_once "views/administration.php";
           
    
        }elseif($_POST["action"]=="modifierOccasion"){
            if($_POST["id"]!=""){
                $voiture = $DB->occasion($_POST["id"]);
                $occasions = $DB->occasion("id IS NOT NULL");
                require_once "views/new-occasion.php";
            }else{
                erreur("il faut choisir une voiture avant de la modifier ;)");
                require_once "views/administration.php";
            }
        }
        require_once "views/footer.php";
    }

    public function changeTimeTables(){
        $DB = new DataBase();      
      
        $Commentaires = $DB->allCommentaires();
        $occasions = $DB->occasion("id IS NOT NULL");
        $allOccasions = $DB->allOccasions();

        $header = [
            "javascript"=>1,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $horaires=$_POST;
        // var_dump($horaires);
        $DB->changerHoraire($horaires);
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/administration.php";

        require_once "views/footer.php";

    }

    public function validateTestimonial(){
        var_dump($_POST);
        if($_POST["id"]==""){
            $DB = new DataBase();
            $horaire =  $DB->allHoraires(); // necessaire pour le footer
            $Commentaires = $DB->allCommentaires();
            $occasions = $DB->occasion("id IS NOT NULL");
            $allOccasions = $DB->allOccasions();

            $header = [
                "javascript"=>0,
                "titre"=>"Administration Garage V.Parrot",
                "content"=>"Administration, do not import on web."]; //necessaire au header de model
            require "models/Header.php";
            require_once "views/header.php";

            require_once 'views/bandeau.php';
            erreur("Il faut selectionner un témoignage avant de faire une operation'!");

            require "views/administration.php";
             
            require_once "views/footer.php";    
            
        }else{
            $DB = new DataBase();
            $DB-> validerTemoignage($_POST["id"], $_POST["valide"]);
            header("Location:".BASE_URL."/administration#temoignage");
        }
        
    }

    public function modifyCarrosserie(){
        $this->modifyService('carrosserie');
    }

    public function modifyMecanique(){
        $this->modifyService('mecanique');
    }

    public function modifyEntretien(){
        $this->modifyService("entretien");
    }

    public function modifyService($service){
        $DB = new DataBase();
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require "views/modif-Service.php";
        require_once "views/footer.php";
    
    }

    public function modify(){
        if(isset($_POST["service"])){
            $DB = new DataBase();
    
            $DB->modifierService($_POST["service"], $_POST["content"],$_POST['titre']);
            header("Location:".BASE_URL."/services");
        }
    }
}