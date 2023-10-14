<?php 

class AdministrationController{
    public function index(){
        if ( !$_SESSION["login"] ){
            header("Location:".BASE_URL."/");
        }
        $DB = new DataBase();
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer

        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";
        require_once "views/bandeau.php";
        require_once "views/header.php";
   
        $Commentaires = $DB->allTestimonials();
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
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        $header = [
            "javascript"=>1,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        require "views/new-salarie.php";
        
        require_once "views/footer.php";
        echo '<script src="../views/script/login.js"></script>';
    }
  
    public function addNewEmployee(){
        $DB = new DataBase();
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $employee = new Employee(htmlentities($_POST["email"]),htmlentities($_POST["nom"]),htmlentities($_POST["prenom"]),'salarié');
        $employee->setPassword(htmlentities($_POST["mdp"]));

        $manager = new Manager($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
        $manager->addEmployee($employee);
       
        $Commentaires = $DB->allTestimonials();
        $occasions = $DB->occasion("id IS NOT NULL");
        $allOccasions = $DB->allOccasions();

        require_once "views/administration.php";
       
        require_once "views/footer.php";
    }

    public function modifyCar(){
        $DB = new DataBase();
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        $Commentaires = $DB->allTestimonials();
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
            $employee = new Employee($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
            $employee->deleteUsedCar($_POST["id"]);
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
      
        $Commentaires = $DB->allTestimonials();
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

        $manager = new Manager($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
        $manager->changeTimeTable($horaires);
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/administration.php";

        require_once "views/footer.php";

    }

    public function validateTestimonial(){
        var_dump($_POST);
        if($_POST["id"]==""){
            $DB = new DataBase();
            $horaire =  $DB->allTimeTable(); // necessaire pour le footer
            $Commentaires = $DB->allTestimonials();
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
            $employee = new Employee($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
            $employee-> validateTestimonial($_POST["id"], $_POST["valide"]);
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
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
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
            $manager = new Manager($_SESSION["email"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["statut"]);
            $manager->modifyService($_POST["service"], htmlentities($_POST["content"]),htmlentities($_POST['titre']));
            header("Location:".BASE_URL."/services");
        }
    }
}