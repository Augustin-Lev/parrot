<?php 
function bandeau($text){
    $file = $_SERVER['REQUEST_URI'];
    echo "
        <div class='headerBandeau succes'>
                <h2>". $text ."</h2>
                <a class=' boutton' href=".$file.">OK</a>
        </div>
    ";
}
function erreur($text){
    $file = $_SERVER['REQUEST_URI'];
    echo "
        <div class='headerBandeau erreur'>
                <h2>". $text ."</h2>
                <a class=' boutton' href=".$file.">OK</a>
        </div>
    ";
}
?>