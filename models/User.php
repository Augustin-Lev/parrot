<?php

class User{
    private $email;
    private $motDePasse;
    private $nom;
    private $prenom;
    private $statut;
    private $id;

    public function __construct($email, $motDePasse, $nom, $prenom, $statut, $id ){
        $this -> email = $email;
        $this -> motDePasse = $motDePasse;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> statut = $statut;
        $this -> id = $id;
    }

    public function setEmail($set){
        $this-> email = $set;
    }
    public function setMotDePasse($set){
        $this-> motDePasse = $set;
    }
    public function setNom($set){
        $this-> nom = $set;
    }
    public function setPrenom($set){
        $this-> prenom = $set;
    }
    public function setStatut($set){
        $this-> statut = $set;
    }
    public function setId($set){
        $this-> id = $set;
    }

    public function getEmail(){
        return $this-> email;
    }
    public function getMotDePasse(){
        return $this-> motDePasse;
    }
    public function getNom(){
        return $this-> nom;
    }
    public function getPrenom(){
        return $this-> prenom;
    }
    public function getStatut(){
        return $this-> statut;
    }
    public function getId(){
        return $this-> id;
    }


    
    
}

