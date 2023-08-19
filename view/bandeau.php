<?php 
function bandeau($text){
    $path = $_SERVER['PHP_SELF'];
    $file = basename ($path);
    echo "
        <div class='headerBandeau succes'>
                <h2>". $text ."</h2>
                <a class=' boutton' href=".$file.">OK</a>
        </div>
    ";
}
function erreur($text){
    $path = $_SERVER['PHP_SELF'];
    $file = basename ($path);
    echo "
        <div class='headerBandeau erreur'>
                <h2>". $text ."</h2>
                <a class=' boutton' href=".$file.">OK</a>
        </div>
    ";
}
?>