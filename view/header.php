<header>
        <div class=headerLogo>
            <img  src="../image/logoBlack.png">
        </div>
        <h2 class=headerTitre>Garage Toulousain</h2>
        <div class="headerLogin">
            <a class="boutton" href="login.php">login</a>
        </div>
      
</header>

<?php 
session_start();
if ($_SESSION["statu"] == "patron" || $_SESSION["statu"] == "salarie" ){ ?>
    <div class="headerAdmin">
        <a  class="boutton" href="administration.php">Administrer</a>
    </div>

<?php }
// echo "POST";
// var_dump($_POST);
// echo "SESSION";
// var_dump($_SESSION);
 ?> 
