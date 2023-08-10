<?php

try {
    $PDO = new PDO('mysql:host=localhost;dbname=u734868843_parrot', 'u734868843_augustin', '4a:P:N6u:LKZ');
}catch(PDOExeption $e){
    echo 'Erreur lors de la connection à la base de donées';
}


function VerifierMdpBdd($PDO,$email,$motDePasse){
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statut FROM salaries', PDO::FETCH_ASSOC) as $user){
        //var_dump($user);
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
    $pdoStatement = $POD->prepare($sql);
    $pdoStatement->bindValue(':services', $services);
    $pdoStatement->bindValue(':contenu', $content);
    $pdoStatement->bindValue(':modificateur', $_SESSION["nom"].' '.$_SESSION["prenom"]);
    $pdoStatement->bindValue(':parution', "METTRE LA DATE");

    if($pdoStatement -> execute()) { 
        return "1";                
    }
    return "0";
}
