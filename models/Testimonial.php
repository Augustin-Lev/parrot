<?php

class Testimonial{

    private $authorName;
    private $authorFirstName;
    private $message;
    private $authorPhone;
    private $stars;

    public function __construct($authorName,$authorFirstName,$message,$authorPhone,$stars){
        $this->authorName=$authorName;
        $this->authorFirstName=$authorFirstName;
        $this->message=$message;    
        $this->authorPhone=$authorPhone;
        $this->stars=$stars;
    }

    
    
    
}

