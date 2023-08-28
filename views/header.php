
    <header>
        <a href="<?php echo BASE_URL;?>/" class="headerLogo" >
            <img class="computer-only" src= "<?php echo BASE_URL; ?>/views/image/logoBlack.webp" alt="Logo noir du Garage V.Parrot">
            <?php if($_SERVER['REQUEST_URI'] != BASE_URL.'/'){
                echo '<h2>Menu<h2>';
            } ?>
        </a>
        <h2 class="headerTitre">Garage V.Parrot</h2>

        <?php 

        if(isset($_SESSION["login"])==0){
            session_start();
            $_SESSION["login"] = 0;
            $_SESSION["nom"] = "";
            $_SESSION["prenom"] = "";
            $_SESSION["statut"] = "";
            $_SESSION["email"] = "";
        }
       
        if ($_SESSION["login"] == 0){ ?>
            <div class="headerLogin">
            <a class="boutton" href="<?php echo BASE_URL;?>/login">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </a>
            </div>
        <?php }else{

            echo '<div href="../controller/login.php" class="headerLoger">';
            echo '<div class="computer-only"><p class="poste">'.$_SESSION['statut'].'</p>';
            echo '<p class="nom">'.$_SESSION['nom']." ".$_SESSION['prenom'].'</p></div>';
            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>';
            echo '<a class="headerCache" href="'.BASE_URL.'/deconexion">Se deconnecter</a>';
            echo '</div>'; 
        } ?>
</header>

<?php if (($_SESSION["statut"] == "Gérant" || $_SESSION["statut"] == "salarié") && $_SESSION["login"] ){ ?>
    <div class="headerAdmin">
        <a  class="boutton" href="<?php echo BASE_URL;?>/administration">Administrer</a>
    </div>

<?php }

// echo "POST";
// var_dump($_POST);
// echo "SESSION";
// var_dump($_SESSION);
 ?> 
