<?php 

class TestimonialController{
    public function index(){
        $header = [
            "javascript"=>0,
            "titre"=>"Témoignage Garage V.Parrot",
            "content"=>"
            Les clients donnent leur avis objectif sur la qualité de notre garage. Noté 5 étoiles sur google notre garage prends soin de ses clients.
            "]; //necessaire au header de model
        require_once "models/Header.php";
        require_once "views/bandeau.php";


        //Lancement de la connexion à la base de donnée
        $DB = new DataBase();

        require_once "views/header.php";
        $commentaire = $DB->allTestimonials();

        require_once "views/temoignage.php";

        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }

    public function action(){
        $DB = new DataBase();
        $header = [
            "javascript"=>0,
            "titre"=>"Témoignage Garage V.Parrot",
            "content"=>"
            Les clients donnent leur avis objectif sur la qualité de notre garage. Noté 5 étoiles sur google notre garage prends soin de ses clients.
            "]; //necessaire au header de model
        require_once "models/Header.php";
        require_once "views/bandeau.php";
        require_once "views/header.php";

        if (isset($_POST["action"])){
            if ($_POST["action"]=="newTemoignage"){
                require_once "views/new-temoignage.php";
            }
            if ($_POST["action"]=="enregistrer"){
                $commentaire = $DB->allTestimonials();
                $visiteur = new Visitor("fakeEmail@email.com",htmlentities($_POST["Nom"]),htmlentities($_POST["prenom"]),"33333333333");
                $visiteur->newTestimonial(htmlentities($_POST["Etoile"]), htmlentities($_POST["commentaire"]));
                bandeau("Votre témoignage a bien été ajouté, il sera ajouté au site après validation d'un opérateur");
                require_once "views/temoignage.php";

            }
            
        }else{
            $commentaire = $DB->allTestimonials();
            require_once "views/temoignage.php";
        }
        $horaire =  $DB->allTimeTable(); // necessaire pour le footer
        require_once "views/footer.php";
    }
}