<?php 

class ServicesController{
    public function index(){
        $header = [
            "javascript"=>0,
            "titre"=>"Services Garage V.Parrot",
            "content"=>"
            Principalement axé sur la réparation de carroserie, la mécanique et les controles techniques, 
            le garrage parrot vous propose un service de qualité d'une efficacité hors norme.
            "]; //necessaire au header de model
        require "models/Header.php";

        require_once "views/header.php";
        $DB = new DataBase();

        $Services = $DB-> allServices();
        require_once "views/services.php";
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }
}