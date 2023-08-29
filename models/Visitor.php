<?php

class Visitor{
    private $email;
    private $name;
    private $firstName;
    private $phone;

    public function __construct($email, $name, $firstName){
        $this -> email = $email;
        $this -> name = $name;
        $this -> firstName = $firstName;
    }

    public function setEmail($set){
        $this-> email = $set;
    }
    public function setName($set){
        $this-> name = $set;
    }
    public function setFirstName($set){
        $this-> firstName = $set;
    }
   
    public function getEmail(){
        return $this-> email;
    }
    public function getName(){
        return $this-> name;
    }
    public function getFirstName(){
        return $this-> firstName;
    }
    
    public function newTestimonial(int $stars, string $message){
        $DB= new DataBase;
        $PDO = $DB->getPDO();

        if ($_POST["valide"]){
            $valide=1;
        }else{
            $valide =0;
        }

        $sql ='INSERT INTO temoignage (parution, etoile, valide, nom, prenom, commentaire) VALUES (:parution, :etoile, :valide, :nom, :prenom, :commentaire);';
        $PDOStatement= $PDO->prepare($sql);
        $PDOStatement->bindValue(':parution', date("d/m/Y"), PDO::PARAM_STR);
        $PDOStatement->bindValue(':etoile', $stars, PDO::PARAM_STR);
        $PDOStatement->bindValue(':valide',$valide, PDO::PARAM_STR);
        $PDOStatement->bindValue(':nom', $this->name, PDO::PARAM_STR);
        $PDOStatement->bindValue(':prenom',$this->firstName, PDO::PARAM_STR);
        $PDOStatement->bindValue(':commentaire', $message , PDO::PARAM_STR);
        if($PDOStatement -> execute()) { 
            return "1";          
        }
        return "0";
    }

    public function sendMessage(string $message){
        $DB = new DataBase;
        $PDO = $DB->getPDO();
        foreach($PDO-> query("SELECT email FROM salaries", PDO::FETCH_ASSOC) as $mail){
            if (isset($liste)==0){
                $liste = $mail["email"];
            }else{
                $liste = $liste.','.$mail["email"];
            }
        }
        $headers = 'From: '.$this->email. "\r\n" .
        'Reply-To: '.$this->email;

        mail($liste,"Message Client Site Internet",$message, $headers);
    }

    public function reserveCar(int $id){
        $DB= new DataBase;
        $PDO = $DB->getPDO();
        foreach($PDO-> query("SELECT email FROM salaries", PDO::FETCH_ASSOC) as $mail){
            if (isset($liste)==0){
                $liste = $mail["email"];
            }else{
                $liste = $liste.','.$mail["email"];
            }
        }
        $text = $this->firstName." ".$this->name."souhaite reserver le véhicule : ".$id."<br/> Numero : ".$this->phone;
        $headers = 'From: '.$this->email. "\r\n" .
        'Reply-To: '.$this->email;
        
        mail($admin,"Reservation Véhicule",$text, $headers);
    }
}

