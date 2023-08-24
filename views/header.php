<?php 
session_start();
?>

<header <?php if(basename ($_SERVER['PHP_SELF']) == "index.php"){echo 'class="computer-only"';} ?>>
        <a  href="../controller/index.php" class="headerLogo" >
            <img src= "<?php echo BASE_URL; ?>/views/image/logoBlack.webp" alt="Logo noir du Garage V.Parrot">
            <?php if(basename ($_SERVER['PHP_SELF']) != "index.php"){
                echo '<h2>Menu<h2>';
            } ?>
            
        </a>
        <h2 class="headerTitre">Garage V.Parrot</h2>

        <?php 
        
        if(isset($_SESSION)==0){
            session_start();
            $_SESSION["login"] = 0;
            $_SESSION["nom"] = "";
            $_SESSION["prenom"] = "";
            $_SESSION["statut"] = "";
            $_SESSION["email"] = "";
        }
        
        if ($_SESSION["login"] == 0){ ?>
            <div class="headerLogin">
                <a class="boutton" href="login.php">login</a>
            </div>
        <?php }else{
            echo '<div href="../controller/login.php" class="headerLoger">';
            echo '<p class="poste">'.$_SESSION['statut'].'</p>';
            echo '<p class="nom">'.$_SESSION['nom']." ".$_SESSION['prenom'].'</p>';
            echo '<a class="headerCache" href="../controller/index.php?action=unlog">Se deconnecter</a>';
            echo '</div>'; 
        } ?>
</header>

<?php if (($_SESSION["statut"] == "Gérant" || $_SESSION["statut"] == "salarié") && $_SESSION["login"] ){ ?>
    <div class="headerAdmin">
        <a  class="boutton" href="administration.php">Administrer</a>
    </div>

<?php }
// echo "POST";
// var_dump($_POST);
// echo "SESSION";
// var_dump($_SESSION);
 ?> 
