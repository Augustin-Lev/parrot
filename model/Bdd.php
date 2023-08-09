<?php

try {
    $PDO = new PDO('mysql:host=localhost;dbname=u734868843_parrot', 'u734868843_augustin', '4a:P:N6u:LKZ');
}catch(PDOExeption $e){
    echo 'Erreur lors de la connection à la base de donées';
}


function VerifierMdpBdd($PDO,$email,$motDePasse){
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statu FROM salaries', PDO::FETCH_ASSOC) as $user){
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
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statu, id FROM salaries', PDO::FETCH_ASSOC) as $user){
        //var_dump($user);
        if ($user['email'] === $mail){

            $id = $user['id'];
            $statu = $user['statu'];
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
          
            
            $sql ='INSERT INTO salaries (id, statu, nom, prenom, email, motDePasse) VALUES (:id, :statu, :nom, :prenom, :email, :motDePasse);';
            $pdoStatement= $PDO->prepare($sql);

            $pdoStatement->bindValue(':id',$id, PDO::PARAM_STR);
            $pdoStatement->bindValue(':statu',$statu,PDO::PARAM_STR);
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
    foreach ($PDO-> query('SELECT parution, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
        //var_dump($temoignage);
        if ($compteur > 0){
            $compteur --;

            $Commentaire = array(
                "parution" => $temoignage["parution"],
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
    $TroisCommentaire = array();
    $compteur = 3; 
    foreach ($PDO-> query('SELECT parution, etoile, nom, prenom, commentaire FROM temoignage', PDO::FETCH_ASSOC) as $temoignage){
        //var_dump($temoignage);
        if ($compteur > 0){
            $compteur --;

            $Commentaire = array(
                "parution" => $temoignage["parution"],
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