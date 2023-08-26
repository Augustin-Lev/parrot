<?php 
function bandeau($text){
    $file = $_SERVER['REQUEST_URI'];
    echo "
        <script>
            function masquer(){
                document.getElementById('bandeau').style.display = 'none';
            }
        </script>
        <div id='bandeau' class='headerBandeau succes'>
                <h2>". $text ."</h2>
                <button class='boutton' onclick='masquer()'>OK</button>
        </div>
    ";
}
function erreur($text){
    $file = $_SERVER['REQUEST_URI'];
    echo "
        <script>
            function masquer(){
                document.getElementById('bandeau').style.display = 'none';
            }
        </script>
        <div id='bandeau' class='headerBandeau erreur'>
                <h2>". $text ."</h2>
                <a class=' boutton' href=".$file.">OK</a>
                <script>
        </div>
    ";
}
?>