<?php

class DataBase{
    
    private $NameDB ; 
    private $UserDB ; 
    private $PasswordDB ;
    private $PDO;

 
    public function __construct(){
        $log = fopen("models/connect.csv","r");
        $line = 1;
        while (($line = fgetcsv($log)) !== FALSE) {
            // var_dump($line);
            $this->NameDB = $line[0];
            $this->UserDB = $line[1];
            $this->PasswordDB = $line[2];
        }
        fclose($log);

        try {
            $this-> PDO = new PDO('mysql:host=localhost;dbname='.$this->NameDB, $this->UserDB, $this->PasswordDB);
        }catch(PDOExeption $e){
            echo 'Erreur lors de la connection à la base de donées';
        }
    }

    public function getPDO(){
        return $this->PDO;
    }

    public function threeTestimonials(){
        $TroisCommentaire = array();
        $compteur = 3; 
        foreach ($this-> PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
            //var_dump($temoignage);
            if ($compteur > 0){
                $compteur --;
    
                $Commentaire = array(
                    "id" => $temoignage["id"],
                    "parution" => $temoignage["parution"],
                    "valide" => $temoignage["valide"],
                    "etoile" => $temoignage["etoile"],
                    "nom" => $temoignage ["nom"],
                    "prenom" => $temoignage ["prenom"],
                    "commentaire" => $temoignage ["commentaire"]
                );
                array_push($TroisCommentaire, $Commentaire);
    
            }
        }
        return $TroisCommentaire;
    }
    public function allTimeTable(){
        $horaires = array();
    
        foreach ($this-> PDO-> query('SELECT id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2 FROM horaire', PDO::FETCH_ASSOC) as $ligne){
            //var_dump($ligne);
         
            $horaire = array(
                'id' => $ligne["id"],
                'journee' => $ligne["journee"],
                'lundi1' => $ligne["lundi1"],
                'lundi2' => $ligne["lundi2"],
                'mardi1' => $ligne["mardi1"],
                'mardi2' => $ligne["mardi2"],
                'mercredi1' => $ligne["mercredi1"],
                'mercredi2' => $ligne["mercredi2"],
                'jeudi1' => $ligne["jeudi1"],
                'jeudi2' => $ligne["jeudi2"],
                'vendredi1' => $ligne["vendredi1"],
                'vendredi2' => $ligne["vendredi2"],
                'samedi1' => $ligne["samedi1"],
                'samedi2' => $ligne["samedi2"],
                'dimanche1' => $ligne["dimanche1"],
                'dimanche2' => $ligne["dimanche2"]
            );
            if( $ligne["id"]== "1"){
                $horaires[0]= $horaire;
            }else{
                $horaires[1]= $horaire;
            }
           
        }
        return $horaires;
    }
    public function allTestimonials(){
        $Commentaires = array();

        foreach ($this-> PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
            //var_dump($temoignage);
        
            $Commentaire = array(
                "id" => $temoignage["id"],
                "parution" => $temoignage["parution"],
                "valide" => $temoignage["valide"],
                "etoile" => $temoignage["etoile"],
                "nom" => $temoignage ["nom"],
                "prenom" => $temoignage ["prenom"],
                "commentaire" => $temoignage ["commentaire"]
            );
            array_push($Commentaires, $Commentaire);

            
        }
        return $Commentaires;

    }
    public function occasion($id){
       
        foreach ($this-> PDO-> query('SELECT * FROM occasion WHERE id LIKE '.$id , PDO::FETCH_ASSOC) as $vehicule){
            return $vehicule;
        }
    }
    public function maxIdOccasion(){
       
        $grand = 1;
        foreach ($this->PDO-> query('SELECT id FROM occasion ORDER BY id' , PDO::FETCH_ASSOC) as $id){
            // var_dump($id);
            if($id['id'] >= $grand){
                $grand = $id['id'];
            }
        }
        return $grand;
    }
    public function allEmployee(){
        $employes = array();
        
        foreach ($this-> PDO-> query('SELECT statut, nom, prenom, email, motDePasse FROM salaries', PDO::FETCH_ASSOC) as $people){
            //var_dump($people);
            $employe = new Employee($people["email"],$people["nom"],$people["prenom"],$people["statut"]);       
            array_push($employes, $employe);
        }
        //tableau d'objets
        return $employes;
    }

    public function mailGestion(){
        foreach($this-> PDO-> query("SELECT email FROM salaries", PDO::FETCH_ASSOC) as $mail){
            if (isset($liste)==0){
                $liste = $mail["email"];
            }else{
                $liste = $liste.','.$mail["email"];
            }
        }
    
        return $liste;
    }
    public function allServices(){
        $tableau = array();
        foreach ($this-> PDO-> query('SELECT * FROM contenu', PDO::FETCH_ASSOC) as $ligne){
            array_push($tableau, $ligne);
         }
        return($tableau);
    }
    
    
    

    
    public function allOccasions(){
        $occasions = array();

        foreach ($this-> PDO-> query('SELECT id, modificateur,marque, modèle, Prix, descriptions,miseEnCirculation,kilométrage, imageClef FROM occasion', PDO::FETCH_ASSOC) as $vehicule){
            //var_dump($vehicule);

            $occasion = array(
                "id" => $vehicule["id"],
                "modificateur" => $vehicule["modificateur"],
                "marque" => $vehicule["marque"],
                "modèle" => $vehicule["modèle"],
                "Prix" => $vehicule ["Prix"],
                "descriptions" => $vehicule ["descriptions"],
                "miseEnCirculation" => $vehicule ["miseEnCirculation"],
                "kilométrage" => $vehicule ["kilométrage"],
                "imageClef" => $vehicule ["imageClef"]
                
            );
            array_push($occasions, $occasion);

            
        }
        return $occasions;

    }
    function supprimerOccasion($id){
        $sql = 'DELETE FROM occasion WHERE id like '.$id.';';
        $this-> PDOStatement= $this-> PDO->prepare($sql);
        if($this-> PDOStatement -> execute()) { 
            return "1";                
        }
        return "0";
    
    }
    

}

