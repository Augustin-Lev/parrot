<?php 

class LoginController{
    public function index(){
        echo "ok";
        require_once "views/header.php";
        require_once "views/login.php";
    }
}