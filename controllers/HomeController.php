<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
       
        <link rel="stylesheet" href="views\style\stylesheet.css">
        <link rel="stylesheet" href="views\style\stylesheet-tel.css">
        <title>Garrage Toulousain V.Parrot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        Réparation de la carrosserie, de la mécanique, ou entretien régulier de vos automobiles par le garrage Parrot à Toulouse. 
        ">
    </head>

    <body>


<?php

class HomeController {
    public function index(){
        require_once "views/header.php";
        require_once "views/index.php";
    }
}