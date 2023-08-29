<?php

class Manager extends Employee{
    public function addEmployee(employee $employee){
        $PDO = $DB->setPDO();

        $sql ='INSERT INTO salaries (statut, nom, prenom, email, motDePasse) VALUES ( :statut, :nom, :prenom, :email, :motDePasse);';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement->bindValue(':statut',"salarié", PDO::PARAM_STR);
        $PDOStatement->bindValue(':nom',$employee->getNom(),PDO::PARAM_STR);
        $PDOStatement->bindValue(':prenom',$employee->getPrenom(),PDO::PARAM_STR);
        $PDOStatement->bindValue(':email',$employee->getEmail(),PDO::PARAM_STR);
        $PDOStatement->bindValue(':motDePasse',password_hash($employee->getMotDePasse(),PASSWORD_DEFAULT),PDO::PARAM_STR);
        $PDOStatement -> execute();
    }  
    public function changeTimeTable($tableau){
        $PDO = $DB->setPDO();
        reset($tableau);
        foreach ($tableau as $valeur){
            if (key($tableau) == "close"){
                $tableau[$valeur."1"] = "CLOSE";
                $tableau[$valeur."2"] = "CLOSE";
                
            }elseif(key($tableau) == "open"){
                $tableau[$valeur."1"] = "00:00";
                $tableau[$valeur."2"] = "00:00";
            }
            next($tableau);
        }
        // var_dump($tableau);
    
        $sql = 'DELETE FROM horaire WHERE id like 1';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement -> execute();
        $sql = 'DELETE FROM horaire WHERE id like 2';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement -> execute();
    
        $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
        $PDOStatement = $PDO->prepare($sql);
    
        $PDOStatement->bindValue(':id', 1,PDO::PARAM_STR);
        $PDOStatement->bindValue(':journee','matin',PDO::PARAM_STR);
        $PDOStatement->bindValue(':lundi1',$tableau["matin-lundi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':lundi2',$tableau["matin-lundi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mardi1',$tableau["matin-mardi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mardi2',$tableau["matin-mardi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mercredi1',$tableau["matin-mercredi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mercredi2',$tableau["matin-mercredi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':jeudi1',$tableau["matin-jeudi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':jeudi2',$tableau["matin-jeudi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':vendredi1',$tableau["matin-vendredi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':vendredi2',$tableau["matin-vendredi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':samedi1',$tableau["matin-samedi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':samedi2',$tableau["matin-samedi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':dimanche1',$tableau["matin-dimanche1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':dimanche2',$tableau["matin-dimanche2"],PDO::PARAM_STR);
       
        $PDOStatement -> execute();
    
        $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
        $PDOStatement = $PDO->prepare($sql);
        $PDOStatement->bindValue(':id', 2,PDO::PARAM_STR);
        $PDOStatement->bindValue(':journee','aprem',PDO::PARAM_STR);
        $PDOStatement->bindValue(':lundi1',$tableau["aprem-lundi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':lundi2',$tableau["aprem-lundi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mardi1',$tableau["aprem-mardi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mardi2',$tableau["aprem-mardi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mercredi1',$tableau["aprem-mercredi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':mercredi2',$tableau["aprem-mercredi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':jeudi1',$tableau["aprem-jeudi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':jeudi2',$tableau["aprem-jeudi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':vendredi1',$tableau["aprem-vendredi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':vendredi2',$tableau["aprem-vendredi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':samedi1',$tableau["aprem-samedi1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':samedi2',$tableau["aprem-samedi2"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':dimanche1',$tableau["aprem-dimanche1"],PDO::PARAM_STR);
        $PDOStatement->bindValue(':dimanche2',$tableau["aprem-dimanche2"],PDO::PARAM_STR);
       
        $PDOStatement -> execute();
    }
    public function modifyService($service, $content, $title){
        $PDO = $DB->setPDO();

        $sql ='DELETE FROM `contenu` WHERE `services`LIKE :services';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement->bindValue(':services',$service,PDO::PARAM_STR);
        $PDOStatement -> execute();
    
        $sql ='INSERT INTO `contenu` (services,contenu,titre, modificateur, parution) VALUES (:services,:contenu, :titre, :modificateur, :parution);';
        $PDOStatement = $PDO->prepare($sql);
        $PDOStatement->bindValue(':services', $service);
        $PDOStatement->bindValue(':contenu', $content);
        $PDOStatement->bindValue(':titre', $title);
        $PDOStatement->bindValue(':modificateur', $_SESSION["nom"].' '.$_SESSION["prenom"]);
        $PDOStatement->bindValue(':parution', "METTRE LA DATE");

        $PDOStatement -> execute();
    }
}

