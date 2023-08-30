<?php 
function bandeau($text){
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
    $_SESSION['sucess'] = "";
}
function erreur($text){
    echo "
        <script>
            function masquer(){
                document.getElementById('bandeau').style.display = 'none';
            }
        </script>
        <div id='bandeau' class='headerBandeau erreur'>
                <h2>". $text ."</h2>
                <button class='boutton' onclick='masquer()'>OK</button>
        </div>
    ";
    $_SESSION['erreur'] = "";
}
?>