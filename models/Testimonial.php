<?php

class Testimonial{


    private $message;
    private $stars;

    public function __construct($message,$stars){
        $this->message=$message;    
        $this->stars=$stars;
    }

    public function getStars(){
        return $this->stars;
    }
    public function getMessage(){
        return $this->message;
    }

}



