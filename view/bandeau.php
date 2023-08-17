<?php 
function bandeau($text){
    $path = $_SERVER['PHP_SELF'];
    $file = basename ($path);
    echo "
        <div class='headerBandeau'>
                <h2>". $text ."</h2>
                <a class='bouttonBandeau boutton' href=".$file.">OK</a>
        </div>
    ";
}
?>