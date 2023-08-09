<?php 
session_start();
?>

<header>
        <div class=headerLogo>
            <img  src="../image/logoBlack.png">
        </div>
        <h2 class=headerTitre>Garage Toulousain</h2>

        <?php if ($_SESSION["login"] == 0){ ?>
            <div class="headerLogin">
                <a class="boutton" href="login.php">login</a>
            </div>
        <?php }else{
            echo '<div class="headerLoger">';
            echo '<p class="poste">'.$_SESSION['statu'].'</p>';
            echo '<p class="nom">'.$_SESSION['nom']." ".$_SESSION['prenom'].'</p>';
            echo '</div>'; 
        } ?>
      
</header>

<?php if ($_SESSION["statu"] == "patron" || $_SESSION["statu"] == "salarie" ){ ?>
    <div class="headerAdmin">
        <a  class="boutton" href="administration.php">Administrer</a>
    </div>

<?php }
// echo "POST";
// var_dump($_POST);
// echo "SESSION";
// var_dump($_SESSION);
 ?> 
