<?php

class Employee extends Visitor{
    private $password;
    private $statut;
    private $id;


    public function __construct($email, $name, $firstName,$statut){
        parent::__construct($name,$firstName);
        $this -> setEmail($email);
        $this -> statut = $statut;
    }

    public function setPassword($set){
        $this-> password = $set;
    }
    public function setstatut($set){
        $this-> statut = $set;
    }

    public function getPassword(){
        return $this-> password;
    }
    public function getStatut(){
        return $this-> statut;
    }
    public function getId(){
        return $this-> id;
    }

    public function addUsedCar($tableau){
        // $tableau["imageClef"] = "../image/occasion/voiture1.jpg ";
        // phpinfo();
        $DB = new DataBase; 
        $PDO = $DB->getPDO();

        $id=0;   
        if(isset($tableau["id"])){  
            if ($tableau["id"] != ""){
                $sql ='DELETE FROM `occasion` WHERE `id`LIKE '.$tableau["id"].";";
                $PDOStatement= $PDO->prepare($sql);
                $PDOStatement -> execute();
                unset($tableau["id"] );
            }
        }
        if(isset($tableau["nbImagesDeja"])){  
            if ($tableau["nbImagesDeja"] != ""){
                $nbImagesDeja = $tableau["nbImagesDeja"];
                unset($tableau["nbImagesDeja"] );
            }
        }else{
            $nbImagesDeja = 0;
        }
        
        //id de l'enregistrement devient le dernier id de la base de donnée
        $id = $DB->maxIdOccasion($PDO)+1;
        
        // création du dosser contenant les images
        if (is_dir("views/image/occasion/".$id) == 0){
            mkdir("views/image/occasion/".$id);
        }
        
        //initialisation du compteur d'image enregistré
        $nbImages = 0;
        
        // var_dump($_FILES);
        $erreur = "";
        foreach($_FILES as $fichier){
            switch($fichier["error"]){
                case 0:
                    $nbImages ++;
                    move_uploaded_file($fichier['tmp_name'], "views/image/occasion/".$id."/image".$nbImages.".".substr($fichier['name'],-3,4));
                    break;
                case 1:
                    $erreur .= "le fichier ".$fichier['name']." est trop lourd pour être chargé <br/>";
                    break;

            }
        }
        //les images étant été écrasé,
        //si il y avait plus d'image avant le changement, on garde les images qui n'ont pas été remplacés
        if ($nbImagesDeja > $nbImages){
            $nbImages = $nbImagesDeja;
        }
        if($nbImages==0){
            copy("views/image/voitureSansImage.webp","views/image/occasion/".$id."/image1.webp");
            $nbImages = 1;
        }

        //initialisation des chaines de caractère
        $champ = "modificateur, imageClef,id";
        $binValue = "'".$_SESSION["email"]."','".$nbImages."','".$id;
        // var_dump($tableau);
        
        //créaction de deux chaines de caractère qui vont être inséré dans la requête.
        reset($tableau);
        foreach($tableau as $parametre){
            if (key($tableau) != 'action' && key($tableau) != 'id'){
                $champ = $champ.",".key($tableau);
                $binValue = $binValue."','".$parametre;
            }    
            next($tableau);   
        }
    
        $sql ="INSERT INTO occasion (".$champ.") VALUES (".$binValue."');";
        // var_dump($sql);
        $PDOStatement= $PDO->prepare($sql);
        // echo $sql.'<br/>';

        if($PDOStatement -> execute()) { 
            return $erreur;                
        }
        return "0";
    }
    public function deleteUsedCar($id){
        $DB = new DataBase; 
        $PDO = $DB->getPDO();
        $sql = 'DELETE FROM occasion WHERE id like '.$id.';';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement -> execute();
    }
    public function validateTestimonial($id, $valide){
        $DB = new DataBase; 
        $PDO = $DB->getPDO();
        $sql = "UPDATE `temoignage` SET `valide` = '".$valide."' WHERE `temoignage`.`id` = ".$id.";";
        $PDOStatement = $PDO->prepare($sql);
        $PDOStatement -> execute();

    }
    public function newPassword($mail, $motDePasse){

        $DB = new DataBase; 
        $PDO = $DB->getPDO();
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
                $PDOStatement= $PDO->prepare($sql);
                $PDOStatement->bindValue(':email',$email,PDO::PARAM_STR);
                if($PDOStatement -> execute() == false) {   
                    echo  'ERREUR au niveau de la suppression du salarie';                     
                }
              
                $sql ='INSERT INTO salaries (id, statut, nom, prenom, email, motDePasse) VALUES (:id, :statut, :nom, :prenom, :email, :motDePasse);';
                $PDOStatement= $PDO->prepare($sql);
    
                $PDOStatement->bindValue(':id',$id, PDO::PARAM_STR);
                $PDOStatement->bindValue(':statut',$statut,PDO::PARAM_STR);
                $PDOStatement->bindValue(':nom',$nom,PDO::PARAM_STR);
                $PDOStatement->bindValue(':prenom',$prenom,PDO::PARAM_STR);
                $PDOStatement->bindValue(':email',$email,PDO::PARAM_STR);
                $PDOStatement->bindValue(':motDePasse',password_hash($motDePasse,PASSWORD_DEFAULT),PDO::PARAM_STR);

                if($PDOStatement -> execute()) { 
                    return "1";                
                }
                else{
                    return "0";
                }
            }
        }
        return 0;
    }
    public function addField($after,$table,$field){
        $DB = new DataBase; 
        $PDO = $DB->getPDO();
        $sql ="ALTER TABLE `".$table."` ADD `".$field."` VARCHAR(100) AFTER `".$after."` ";
        $PDOStatement = $PDO->prepare($sql);
        try{
            $PDOStatement -> execute();
        }catch( Exception $erreur){
            return 'error';
        }
    }
    public function verifyPassword($email,$password){
        $DB = new DataBase();
        $PDO = $DB->getPDO();

        foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statut FROM salaries', PDO::FETCH_ASSOC) as $user){
            if ($user['email'] === $email && password_verify($password,$user['motDePasse']) ){ 
                return $user;
            }
        }
        return 0;
    }
}

