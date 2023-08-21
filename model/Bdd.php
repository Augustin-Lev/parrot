<?php

$log = fopen("../model/log.csv","r");

$line = 1;

while (($line = fgetcsv($log)) !== FALSE) {
    // var_dump($line);
    $logUserDB = $line[0];
    $logPasswordDB = $line[1];
    $logName = $line[2];
    $logSurname = $line[3];
    $logEmail = $line[4];
    $logPassword = $line[5];
}
fclose($log);


try {
    $PDO = new PDO('mysql:host=localhost;dbname=parrot', $logUserDB, $logPasswordDB);
}catch(PDOExeption $e){
    echo 'Erreur lors de la connection à la base de donées';
}


function VerifierMdpBdd($PDO,$email,$motDePasse){
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statut FROM salaries', PDO::FETCH_ASSOC) as $user){
        if ($user['email'] === $email &&
            $user['motDePasse'] === $motDePasse){
            
            return $user;
        }
    }
    return 0;
}

function newMdp($PDO, $mail, $motDePasse){
    //verification de la validité du mot de passe
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statut, id FROM salaries', PDO::FETCH_ASSOC) as $user){
        //var_dump($user);
        if ($user['email'] === $mail){

            $id = $user['id'];
            $statut = $user['statut'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $email = $user['email'];

            $sql ='DELETE FROM `salaries` WHERE `email`LIKE :email';
            $pdoStatement= $PDO->prepare($sql);
            $pdoStatement->bindValue(':email',$email,PDO::PARAM_STR);
            if($pdoStatement -> execute()) {                        
            }
            else{
                echo  'ERREUR au niveau de la suppression du salarie';
            }  
          
            
            $sql ='INSERT INTO salaries (id, statut, nom, prenom, email, motDePasse) VALUES (:id, :statut, :nom, :prenom, :email, :motDePasse);';
            $pdoStatement= $PDO->prepare($sql);

            $pdoStatement->bindValue(':id',$id, PDO::PARAM_STR);
            $pdoStatement->bindValue(':statut',$statut,PDO::PARAM_STR);
            $pdoStatement->bindValue(':nom',$nom,PDO::PARAM_STR);
            $pdoStatement->bindValue(':prenom',$prenom,PDO::PARAM_STR);
            $pdoStatement->bindValue(':email',$email,PDO::PARAM_STR);
            $pdoStatement->bindValue(':motDePasse',$motDePasse,PDO::PARAM_STR);

            if($pdoStatement -> execute()) { 
                return "1";                
            }
            else{
                return "0";
            }
            
        }
    }
    return 0;
}


function TroisCommentaires($PDO){
    $TroisCommentaire = array();
    $compteur = 3; 
    foreach ($PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
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

function allCommentaires($PDO){
    $Commentaires = array();

    foreach ($PDO-> query('SELECT id, parution,valide, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
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

function AjouterEmploye($PDO, $nom, $prenom, $email, $mdp){
    $sql ='INSERT INTO salaries (statut, nom, prenom, email, motDePasse) VALUES ( :statut, :nom, :prenom, :email, :motDePasse);';
    $pdoStatement= $PDO->prepare($sql);
    $pdoStatement->bindValue(':statut',"salarié", PDO::PARAM_STR);
    $pdoStatement->bindValue(':nom',$nom,PDO::PARAM_STR);
    $pdoStatement->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $pdoStatement->bindValue(':email',$email,PDO::PARAM_STR);
    $pdoStatement->bindValue(':motDePasse',$mdp,PDO::PARAM_STR);
    
    if($pdoStatement -> execute()) { 
        return "1";                
    }
    return "0";

}

function allEmploye($PDO){
    $employes = array();
    
    foreach ($PDO-> query('SELECT statut, nom, prenom, email, motDePasse FROM salaries', PDO::FETCH_ASSOC) as $people){
        //var_dump($people);
    
        $employe = array(
            "statut" => $people["statut"],
            "nom" => $people["nom"],
            "prenom" => $people["prenom"],
            "email" => $people["email"],
            "motDePasse" => $people ["motDePasse"],

        );
        array_push($employes, $employe);
    }
    return $employes;
}
function modifierService($PDO, $service, $content){

    $sql ='DELETE FROM `contenu` WHERE `services`LIKE :services';
    $pdoStatement= $PDO->prepare($sql);
    $pdoStatement->bindValue(':services',$service,PDO::PARAM_STR);
    if($pdoStatement -> execute()) {                        
    }
    else{
        echo  'ERREUR au niveau de la suppression du contenu';
    }  
  
    $sql ='INSERT INTO `contenu` (services,contenu, modificateur, parution) VALUES (:services,:contenu, :modificateur, :parution);';
    $pdoStatement = $PDO->prepare($sql);
    $pdoStatement->bindValue(':services', $services);
    $pdoStatement->bindValue(':contenu', $content);
    $pdoStatement->bindValue(':modificateur', $_SESSION["nom"].' '.$_SESSION["prenom"]);
    $pdoStatement->bindValue(':parution', "METTRE LA DATE");

    if($pdoStatement -> execute()) { 
        return "1";                
    }
    return "0";
}

function allOccasions($PDO){
    $occasions = array();

    foreach ($PDO-> query('SELECT id, modificateur,marque, modèle, Prix, descriptions,miseEnCirculation,kilométrage, imageClef FROM occasion', PDO::FETCH_ASSOC) as $vehicule){
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

function occasion($PDO, $id){
    foreach ($PDO-> query('SELECT id, modificateur,miseEnCirculation, imageClef,descriptions,caracteristiques, marque, modèle, Prix,kilométrage,options,galette_de_secours FROM occasion WHERE id LIKE '.$id , PDO::FETCH_ASSOC) as $vehicule){
        //var_dump($vehicule);

        $occasion = array(
            "id" => $vehicule["id"],
            "modificateur" => $vehicule["modificateur"],
            "miseEnCirculation" => $vehicule ["miseEnCirculation"],
            "imageClef" => $vehicule ["imageClef"],
            "descriptions" => $vehicule ["descriptions"],

            "caracteristiques" => $vehicule["caracteristiques"],
            "marque" => $vehicule["marque"],
            "modèle" => $vehicule["modèle"],
            "Prix" => $vehicule ["Prix"],
            "kilométrage" => $vehicule ["kilométrage"],

            "options" => $vehicule["options"],
            "galette_de_secours" => $vehicule["galette_de_secours"]
            
        );
    }
    if(isset($occasion)){
        return $occasion;

    }
  
}

function AjouterOccasion($PDO, $tableau){
    // $tableau["imageClef"] = "../image/occasion/voiture1.jpg ";
    // phpinfo();
    $id=0;   
    if(isset($tableau["id"])){  
        if ($tableau["id"] != ""){
            $sql ='DELETE FROM `occasion` WHERE `id`LIKE '.$tableau["id"].";";
            $pdoStatement= $PDO->prepare($sql);
            $pdoStatement -> execute();
        }else{
            unset($tableau["id"] );
        }
    }
    $id = oldIdOccasion($PDO)+1;
    if (is_dir("../image/occasion/".$id) == 0){
        mkdir("../image/occasion/".$id);
    }
    
    $nbImages = 0;
    reset($_FILES);
    foreach($_FILES as $fichier){
        if($fichier['name'] != ""){
            $nbImages ++;
            move_uploaded_file($fichier['tmp_name'], "../image/occasion/".$id."/image".$nbImages.".".substr($fichier['name'],-3,4));       
        }
    }
    next($_FILES);
    
    $champ = "modificateur, imageClef,id";
    $binValue = "'".$_SESSION["email"]."','".$nbImages."','".$id;
    var_dump($tableau);

    reset($tableau);
    foreach($tableau as $parametre){
        if (key($tableau) != 'action'){
            $champ = $champ.",".key($tableau);
            $binValue = $binValue."','".$parametre;
        }    
        next($tableau);   
    }

    $sql ="INSERT INTO occasion (".$champ.") VALUES (".$binValue."');";
    // var_dump($sql);
    $pdoStatement= $PDO->prepare($sql);
    // echo $sql.'<br/>';
    
    if($pdoStatement -> execute()) { 
        return "1";                
    }
    return "0";

}
function oldIdOccasion($PDO){
    $grand = 1;
    foreach ($PDO-> query('SELECT id FROM occasion ORDER BY id' , PDO::FETCH_ASSOC) as $id){
        // var_dump($id);
        if($id['id'] >= $grand){
            $grand = $id['id'];
        }
    }
    return $grand;
    
}
function supprimerOccasion($PDO, $id){
    $sql = 'DELETE FROM occasion WHERE id like '.$id.';';
    $pdoStatement= $PDO->prepare($sql);
    if($pdoStatement -> execute()) { 
        return "1";                
    }
    return "0";

}

function nouveauTemoignage($PDO, $valide, $Nom,  $Prenom, $Etoile, $Commentaire){
    $sql ='INSERT INTO temoignage (parution, etoile, valide, nom, prenom, commentaire) VALUES (:parution, :etoile, :valide, :nom, :prenom, :commentaire);';
    $pdoStatement= $PDO->prepare($sql);
    $pdoStatement->bindValue(':parution', date("d/m/Y"), PDO::PARAM_STR);
    $pdoStatement->bindValue(':etoile', $Etoile, PDO::PARAM_STR);
    $pdoStatement->bindValue(':valide', $valide, PDO::PARAM_STR);
    $pdoStatement->bindValue(':nom', $Nom, PDO::PARAM_STR);
    $pdoStatement->bindValue(':prenom', $Prenom, PDO::PARAM_STR);
    $pdoStatement->bindValue(':commentaire', $Commentaire , PDO::PARAM_STR);

   
    if($pdoStatement -> execute()) { 
        return "1";          
    }
    return "0";

}

function getHoraires($PDO){
    $horaires = array();

    foreach ($PDO-> query('SELECT id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2 FROM horaire', PDO::FETCH_ASSOC) as $ligne){
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

function changerHoraire($PDO, $tableau){
    $sql = 'DELETE FROM horaire WHERE id like 1';
    $pdoStatement= $PDO->prepare($sql);
    $pdoStatement -> execute();
    $sql = 'DELETE FROM horaire WHERE id like 2';
    $pdoStatement= $PDO->prepare($sql);
    $pdoStatement -> execute();

    $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
    $pdoStatement = $PDO->prepare($sql);
    
    $pdoStatement->bindValue(':id', 1,PDO::PARAM_STR);
    $pdoStatement->bindValue(':journee','matin',PDO::PARAM_STR);
    $pdoStatement->bindValue(':lundi1',$tableau["matin-lundi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':lundi2',$tableau["matin-lundi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mardi1',$tableau["matin-mardi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mardi2',$tableau["matin-mardi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mercredi1',$tableau["matin-mercredi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mercredi2',$tableau["matin-mercredi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':jeudi1',$tableau["matin-jeudi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':jeudi2',$tableau["matin-jeudi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':vendredi1',$tableau["matin-vendredi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':vendredi2',$tableau["matin-vendredi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':samedi1',$tableau["matin-samedi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':samedi2',$tableau["matin-samedi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':dimanche1',$tableau["matin-dimanche1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':dimanche2',$tableau["matin-dimanche2"],PDO::PARAM_STR);
   
    $pdoStatement -> execute();

    $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
    $pdoStatement = $PDO->prepare($sql);
    $pdoStatement->bindValue(':id', 2,PDO::PARAM_STR);
    $pdoStatement->bindValue(':journee','aprem',PDO::PARAM_STR);
    $pdoStatement->bindValue(':lundi1',$tableau["aprem-lundi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':lundi2',$tableau["aprem-lundi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mardi1',$tableau["aprem-mardi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mardi2',$tableau["aprem-mardi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mercredi1',$tableau["aprem-mercredi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':mercredi2',$tableau["aprem-mercredi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':jeudi1',$tableau["aprem-jeudi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':jeudi2',$tableau["aprem-jeudi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':vendredi1',$tableau["aprem-vendredi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':vendredi2',$tableau["aprem-vendredi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':samedi1',$tableau["aprem-samedi1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':samedi2',$tableau["aprem-samedi2"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':dimanche1',$tableau["aprem-dimanche1"],PDO::PARAM_STR);
    $pdoStatement->bindValue(':dimanche2',$tableau["aprem-dimanche2"],PDO::PARAM_STR);
   
    $pdoStatement -> execute();

}

function validerTemoignage($PDO, $id, $valide){
    $sql = "UPDATE `temoignage` SET `valide` = '".$valide."' WHERE `temoignage`.`id` = ".$id.";";
    $pdoStatement = $PDO->prepare($sql);
    $pdoStatement -> execute();
}

function mailGestion($PDO){
    foreach($PDO-> query("SELECT email FROM salaries", PDO::FETCH_ASSOC) as $mail){
        if (isset($liste)==0){
            $liste = $mail["email"];
        }else{
            $liste = $liste.','.$mail["email"];
        }
    }

    return $liste;
   
  
}