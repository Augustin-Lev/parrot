<?php 

class UsedCarController{
    public function index(){
        $header = [
            "javascript"=>1,
            "titre"=>"Véhicule d'occasions V.Parrot",
            "content"=>"
              Quelque soit votre budget, nous vous proposons tous types de voitures d'occasions !
            Filtrez par prix, kilolétrage ou année de mise en service pour affiner vos recherches. 
            Une page d'informations détaillé vous est proposé pour chaque véhicule, il n'y a plus qu'à reserver !
            "]; //necessaire au header de model
        require "models/Header.php";

        require_once "views/header.php";
        $DB = new DataBase();

        $occasions= $DB->allOccasions();
        require_once "views/occasion.php";      

        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function action(){
        
        if(isset($_POST["action"])){
            if($_POST["action"]=="demandeRenseignement"){
                require "views/contact.php";  
            }
            
        }
    }
    public function newBook(){
        $DB = new DataBase();
        $header = [
            "javascript"=>1,
            "titre"=>"Véhicule d'occasions V.Parrot",
            "content"=>"
              Quelque soit votre budget, nous vous proposons tous types de voitures d'occasions !
            Filtrez par prix, kilolétrage ou année de mise en service pour affiner vos recherches. 
            Une page d'informations détaillé vous est proposé pour chaque véhicule, il n'y a plus qu'à reserver !
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        if($_POST["action"]=="reserver"){
          
            $admin = $DB->mailGestion();

            $text = $_POST["prenom"]." ".$_POST["nom"]."souhaite reserver le véhicule : ".$_POST["id"]."<br/> Numero : ".$_POST["tel"];
            $headers = 'From: '.$_POST["mail"]. "\r\n" .
            'Reply-To: '.$_POST["mail"];
            mail($admin,"Reservation Véhicule",$text, $headers);

            require_once "views/bandeau.php";
            bandeau("votre véhicule à bien été reservé");

            $voiture= $DB->occasion($_POST["id"]);
            require_once "views/occasionPlus.php";  
        }else{
            require "views/contact.php"; 
        }
       
    
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
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

        require "views/newField.php";

        require_once "views/footer.php";
    }

    public function addField(){
        $DB = new DataBase();
        if($DB->ajouterChamp($_POST["champ"],'occasion',$_POST["name"]) == 'error'){

            $horaire =  $DB->allHoraires(); // necessaire pour le footer
            $header = [
                "javascript"=>0,
                "titre"=>"Administration Garage V.Parrot",
                "content"=>"Administration, do not import on web."]; //necessaire au header de model
            require "models/Header.php";
            require_once "views/header.php";
            require_once "views/bandeau.php";
            erreur("ce champs existe surement déjà");
            require_once "views/footer.php";

        }else{
            echo  "<script type='text/javascript'>";
            echo "window.close();";
            echo "</script>";
        }
       

    }

    public function newCar(){
        $DB = new DataBase();
        $occasions = $DB->occasion("id IS NOT NULL");
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        $header = [
            "javascript"=>0,
            "titre"=>"Administration Garage V.Parrot",
            "content"=>"Administration, do not import on web."]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        require "views/new-occasion.php";

        require_once "views/footer.php";

    }
    
    public function addCar(){
        $DB = new DataBase();
        var_dump($_POST);
        require_once "views/bandeau.php";
        $erreur = $DB->ajouterOccasion($_POST);
        var_dump($erreur);
        if ($erreur != 0){
            $_SESSION["erreur"] = $erreur;
        }
        header("Location:".BASE_URL);    
    }

    public function occasionPlus(){
        echo "+0";
        $DB = new DataBase();
        $header = [
            "javascript"=>1,
            "titre"=>"Véhicule d'occasions V.Parrot",
            "content"=>"
              Quelque soit votre budget, nous vous proposons tous types de voitures d'occasions !
            Filtrez par prix, kilolétrage ou année de mise en service pour affiner vos recherches. 
            Une page d'informations détaillé vous est proposé pour chaque véhicule, il n'y a plus qu'à reserver !
            "]; //necessaire au header de model
        require "models/Header.php";
        require_once "views/header.php";

        $id = substr($_SERVER['REQUEST_URI'],19);
        $voiture= $DB->occasion($id);
        require_once "views/occasionPlus.php";
    
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }
}