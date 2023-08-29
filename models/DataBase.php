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
            $employe = new Employee($people["email"],$people ["motDePasse"],$people["nom"],$people["prenom"],$people["statut"]);       
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
    
    // public function allCommentaires(){
    //     $Commentaires = array();

    //     foreach ($this-> PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
    //         //var_dump($temoignage);
        
    //         $Commentaire = array(
    //             "id" => $temoignage["id"],
    //             "parution" => $temoignage["parution"],
    //             "valide" => $temoignage["valide"],
    //             "etoile" => $temoignage["etoile"],
    //             "nom" => $temoignage ["nom"],
    //             "prenom" => $temoignage ["prenom"],
    //             "commentaire" => $temoignage ["commentaire"]
    //         );
    //         array_push($Commentaires, $Commentaire);

            
    //     }
    //     return $Commentaires;

    // }
    
//     public function VerifierMdpBdd($email,$motDePasse){
//         foreach ($this-> PDO-> query('SELECT email, motDePasse, nom, prenom, statut FROM salaries', PDO::FETCH_ASSOC) as $user){
//             if ($user['email'] === $email && password_verify($motDePasse,$user['motDePasse']) ){ 
//                 return $user;
//             }
//         }
//         return 0;
//     }
   
//     public function newMdp($mail, $motDePasse){
//         //verification de la validité du mot de passe
//         foreach ($this-> PDO-> query('SELECT email, motDePasse, nom, prenom, statut, id FROM salaries', PDO::FETCH_ASSOC) as $user){
//             //var_dump($user);
//             if ($user['email'] === $mail){
    
//                 $id = $user['id'];
//                 $statut = $user['statut'];
//                 $nom = $user['nom'];
//                 $prenom = $user['prenom'];
//                 $email = $user['email'];
    
//                 $sql ='DELETE FROM `salaries` WHERE `email`LIKE :email';
//                 $this-> PDOStatement= $this-> PDO->prepare($sql);
//                 $this-> PDOStatement->bindValue(':email',$email,PDO::PARAM_STR);
//                 if($this-> PDOStatement -> execute()) {                        
//                 }
//                 else{
//                     echo  'ERREUR au niveau de la suppression du salarie';
//                 }  
              
                
//                 $sql ='INSERT INTO salaries (id, statut, nom, prenom, email, motDePasse) VALUES (:id, :statut, :nom, :prenom, :email, :motDePasse);';
//                 $this-> PDOStatement= $this-> PDO->prepare($sql);
    
//                 $this-> PDOStatement->bindValue(':id',$id, PDO::PARAM_STR);
//                 $this-> PDOStatement->bindValue(':statut',$statut,PDO::PARAM_STR);
//                 $this-> PDOStatement->bindValue(':nom',$nom,PDO::PARAM_STR);
//                 $this-> PDOStatement->bindValue(':prenom',$prenom,PDO::PARAM_STR);
//                 $this-> PDOStatement->bindValue(':email',$email,PDO::PARAM_STR);
//                 $this-> PDOStatement->bindValue(':motDePasse',password_hash($motDePasse,PASSWORD_DEFAULT),PDO::PARAM_STR);
    
//                 if($this-> PDOStatement -> execute()) { 
//                     return "1";                
//                 }
//                 else{
//                     return "0";
//                 }
                
//             }
//         }
//         return 0;
//     }

//     public function TroisCommentaires(){
//         $TroisCommentaire = array();
//         $compteur = 3; 
//         foreach ($this-> PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
//             //var_dump($temoignage);
//             if ($compteur > 0){
//                 $compteur --;
    
//                 $Commentaire = array(
//                     "id" => $temoignage["id"],
//                     "parution" => $temoignage["parution"],
//                     "valide" => $temoignage["valide"],
//                     "etoile" => $temoignage["etoile"],
//                     "nom" => $temoignage ["nom"],
//                     "prenom" => $temoignage ["prenom"],
//                     "commentaire" => $temoignage ["commentaire"]
//                 );
//                 array_push($TroisCommentaire, $Commentaire);
    
//             }
//         }
//         return $TroisCommentaire;
    
//     }
    
//     function AjouterEmploye(User $employee){
        
//         $sql ='INSERT INTO salaries (statut, nom, prenom, email, motDePasse) VALUES ( :statut, :nom, :prenom, :email, :motDePasse);';
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         $this-> PDOStatement->bindValue(':statut',"salarié", PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':nom',$employee->getNom(),PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':prenom',$employee->getPrenom(),PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':email',$employee->getEmail(),PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':motDePasse',password_hash($employee->getMotDePasse(),PASSWORD_DEFAULT),PDO::PARAM_STR);
        
//         if($this-> PDOStatement -> execute()) { 
//             return "1";                
//         }
//         return "0";
    
//     }
    
//     public function modifierService($service, $content, $titre){

//         $sql ='DELETE FROM `contenu` WHERE `services`LIKE :services';
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         $this-> PDOStatement->bindValue(':services',$service,PDO::PARAM_STR);
//         if($this-> PDOStatement -> execute()) {                        
//         }
//         else{
//             echo  'ERREUR au niveau de la suppression du contenu';
//         }  
    
//         $sql ='INSERT INTO `contenu` (services,contenu,titre, modificateur, parution) VALUES (:services,:contenu, :titre, :modificateur, :parution);';
//         $this-> PDOStatement = $this-> PDO->prepare($sql);
//         $this-> PDOStatement->bindValue(':services', $service);
//         $this-> PDOStatement->bindValue(':contenu', $content);
//         $this-> PDOStatement->bindValue(':titre', $titre);
//         $this-> PDOStatement->bindValue(':modificateur', $_SESSION["nom"].' '.$_SESSION["prenom"]);
//         $this-> PDOStatement->bindValue(':parution', "METTRE LA DATE");

//         if($this-> PDOStatement -> execute()) { 
//             return "1";                
//         }
//         return "0";
//     }

//     public function occasion($id){
//         foreach ($this-> PDO-> query('SELECT * FROM occasion WHERE id LIKE '.$id , PDO::FETCH_ASSOC) as $vehicule){
//             return $vehicule;
//         }
//     }
//     public function maxIdOccasion(){
//         $grand = 1;
//         foreach ($this->PDO-> query('SELECT id FROM occasion ORDER BY id' , PDO::FETCH_ASSOC) as $id){
//             // var_dump($id);
//             if($id['id'] >= $grand){
//                 $grand = $id['id'];
//             }
//         }
//         return $grand;
        
//     }
    

//     public function AjouterOccasion($tableau){
//         // $tableau["imageClef"] = "../image/occasion/voiture1.jpg ";
//         // phpinfo();
        
//         $id=0;   
//         if(isset($tableau["id"])){  
//             if ($tableau["id"] != ""){
//                 $sql ='DELETE FROM `occasion` WHERE `id`LIKE '.$tableau["id"].";";
//                 $this-> PDOStatement= $this-> PDO->prepare($sql);
//                 $this-> PDOStatement -> execute();
//                 unset($tableau["id"] );
//             }
//         }
//         if(isset($tableau["nbImagesDeja"])){  
//             if ($tableau["nbImagesDeja"] != ""){
//                 $nbImagesDeja = $tableau["nbImagesDeja"];
//                 unset($tableau["nbImagesDeja"] );
//             }
//         }else{
//             $nbImagesDeja = 0;
//         }
               
//         $id = $this->maxIdOccasion($this-> PDO)+1;
               
//         if (is_dir("views/image/occasion/".$id) == 0){
//             mkdir("views/image/occasion/".$id);
//         }
              
//         $nbImages = 0;
        
//         // var_dump($_FILES);
//         $erreur = "";
//         foreach($_FILES as $fichier){
//             switch($fichier["error"]){
//                 case 0:
//                     $nbImages ++;
//                     move_uploaded_file($fichier['tmp_name'], "views/image/occasion/".$id."/image".$nbImages.".".substr($fichier['name'],-3,4));
//                     break;
//                 case 1:
//                     $erreur .= "le fichier ".$fichier['name']." est trop lourd pour être chargé <br/>";
//                     break;

//             }
//         }
//         if ($nbImagesDeja > $nbImages){
//             $nbImages = $nbImagesDeja;
//         }
//         if($nbImages==0){
//             copy("views/image/voitureSansImage.webp","views/image/occasion/".$id."/image1.webp");
//             $nbImages = 1;
//         }

       
//         $champ = "modificateur, imageClef,id";
//         $binValue = "'".$_SESSION["email"]."','".$nbImages."','".$id;
//         // var_dump($tableau);
    
//         reset($tableau);
//         foreach($tableau as $parametre){
//             if (key($tableau) != 'action' && key($tableau) != 'id'){
//                 $champ = $champ.",".key($tableau);
//                 $binValue = $binValue."','".$parametre;
//             }    
//             next($tableau);   
//         }
    
//         $sql ="INSERT INTO occasion (".$champ.") VALUES (".$binValue."');";
//         // var_dump($sql);
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         // echo $sql.'<br/>';

//         if($this-> PDOStatement -> execute()) { 
//             return $erreur;                
//         }
//         return "0";
//     }


//     public function nouveauTemoignage($valide, $Nom,  $Prenom, $Etoile, $Commentaire){
//         $sql ='INSERT INTO temoignage (parution, etoile, valide, nom, prenom, commentaire) VALUES (:parution, :etoile, :valide, :nom, :prenom, :commentaire);';
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         $this-> PDOStatement->bindValue(':parution', date("d/m/Y"), PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':etoile', $Etoile, PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':valide', $valide, PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':nom', $Nom, PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':prenom', $Prenom, PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':commentaire', $Commentaire , PDO::PARAM_STR);

    
//         if($this-> PDOStatement -> execute()) { 
//             return "1";          
//         }
//         return "0";

//     }

//     public function changerHoraire($tableau){
//         reset($tableau);
//         foreach ($tableau as $valeur){
//             if (key($tableau) == "close"){
//                 $tableau[$valeur."1"] = "CLOSE";
//                 $tableau[$valeur."2"] = "CLOSE";
                
//             }elseif(key($tableau) == "open"){
//                 $tableau[$valeur."1"] = "00:00";
//                 $tableau[$valeur."2"] = "00:00";
//             }
//             next($tableau);
//         }
//         // var_dump($tableau);
    
//         $sql = 'DELETE FROM horaire WHERE id like 1';
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         $this-> PDOStatement -> execute();
//         $sql = 'DELETE FROM horaire WHERE id like 2';
//         $this-> PDOStatement= $this-> PDO->prepare($sql);
//         $this-> PDOStatement -> execute();
    
//         $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
//         $this-> PDOStatement = $this-> PDO->prepare($sql);
    
//         $this-> PDOStatement->bindValue(':id', 1,PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':journee','matin',PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':lundi1',$tableau["matin-lundi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':lundi2',$tableau["matin-lundi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mardi1',$tableau["matin-mardi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mardi2',$tableau["matin-mardi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mercredi1',$tableau["matin-mercredi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mercredi2',$tableau["matin-mercredi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':jeudi1',$tableau["matin-jeudi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':jeudi2',$tableau["matin-jeudi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':vendredi1',$tableau["matin-vendredi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':vendredi2',$tableau["matin-vendredi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':samedi1',$tableau["matin-samedi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':samedi2',$tableau["matin-samedi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':dimanche1',$tableau["matin-dimanche1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':dimanche2',$tableau["matin-dimanche2"],PDO::PARAM_STR);
       
//         $this-> PDOStatement -> execute();
    
//         $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
//         $this-> PDOStatement = $this-> PDO->prepare($sql);
//         $this-> PDOStatement->bindValue(':id', 2,PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':journee','aprem',PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':lundi1',$tableau["aprem-lundi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':lundi2',$tableau["aprem-lundi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mardi1',$tableau["aprem-mardi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mardi2',$tableau["aprem-mardi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mercredi1',$tableau["aprem-mercredi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':mercredi2',$tableau["aprem-mercredi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':jeudi1',$tableau["aprem-jeudi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':jeudi2',$tableau["aprem-jeudi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':vendredi1',$tableau["aprem-vendredi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':vendredi2',$tableau["aprem-vendredi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':samedi1',$tableau["aprem-samedi1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':samedi2',$tableau["aprem-samedi2"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':dimanche1',$tableau["aprem-dimanche1"],PDO::PARAM_STR);
//         $this-> PDOStatement->bindValue(':dimanche2',$tableau["aprem-dimanche2"],PDO::PARAM_STR);
       
//         $this-> PDOStatement -> execute();
    
//     }

//     public function validerTemoignage($id, $valide){
//         $sql = "UPDATE `temoignage` SET `valide` = '".$valide."' WHERE `temoignage`.`id` = ".$id.";";
//         $this-> PDOStatement = $this->PDO->prepare($sql);
//         $this-> PDOStatement -> execute();
//     }

   

//     public function ajouterChamp($apres,$table,$champ){
//         $sql ="ALTER TABLE `".$table."` ADD `".$champ."` VARCHAR(100) AFTER `".$apres."` ";
//         $this-> PDOStatement = $this-> PDO->prepare($sql);
//         try{
//             $this-> PDOStatement -> execute();
//         }catch( Exception $erreur){
//             return 'error';
//         }      
//     }

    
    

    
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

