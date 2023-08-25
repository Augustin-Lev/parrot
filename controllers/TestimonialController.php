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
        $commentaire = $DB->allCommentaires();

        require_once "views/temoignage.php";

        $horaire =  $DB->allHoraires(); // necessaire pour le footer
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
                $commentaire = $DB->allCommentaires();
                $DB ->nouveauTemoignage($_POST["valide"], $_POST["Nom"], $_POST["prenom"], $_POST["Etoile"], $_POST["commentaire"]);
                bandeau("Votre témoignage a bien été ajouté, il sera ajouté au site après validation d'un opérateur");
                require_once "views/temoignage.php";

            }
            
        }else{
            $commentaire = $DB->allCommentaires();
            require_once "views/temoignage.php";
        }
        $horaire =  $DB->allHoraires(); // necessaire pour le footer
        require_once "views/footer.php";
    }
}