<?php 
session_start();
?>

<header>
        <a class=headerLogo href="../controller/index.php">
            <img  src="../image/logoBlack.png">
        </a>
        <h2 class=headerTitre>Garage Toulousain</h2>

        <?php if ($_SESSION["login"] == 0){ ?>
            <div class="headerLogin">
                <a class="boutton" href="login.php">login</a>
            </div>
        <?php }else{
            echo '<a href="../controller/login.php" class="headerLoger">';
            echo '<p class="poste">'.$_SESSION['statut'].'</p>';
            echo '<p class="nom">'.$_SESSION['nom']." ".$_SESSION['prenom'].'</p>';
            echo '</a>'; 
        } ?>
      
</header>

<?php if ($_SESSION["statut"] == "patron" || $_SESSION["statut"] == "salarié" ){ ?>
    <div class="headerAdmin">
        <a  class="boutton" href="administration.php">Administrer</a>
    </div>

<?php }
echo "POST";
var_dump($_POST);
echo "SESSION";
var_dump($_SESSION);
 ?> 
