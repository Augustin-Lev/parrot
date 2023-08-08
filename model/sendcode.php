<?php


function envoyer($mail)
{
    $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $shfl = str_shuffle($comb);
    $code = substr($shfl,0,6);
   
   
    $_SESSION["mail"] = $mail;
    $_SESSION["code"] = $code;
   
    $text = "Votre code de validation est le suivant : ".$code;

    mail($mail,"Verrification mail Parrot",$text);
}

function verifier($verif){
    
    if($verif == $_SESSION["code"]){
        return 1;
    }
    else {
        return 0;
    }
}




?>