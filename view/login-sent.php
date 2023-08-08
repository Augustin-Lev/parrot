<h1>Mot de passe oublié</h1>
<form action="../controller/login.php" method="post">
    <input name="action" id="action" value="verifier">

    <?php if (isset($_GET["echec"])){?>
        <p> Le code entré ne correspond pas </p>
    <?php } ?>

    
    <label for="verif">code reçu</label>
    <input type="text" id="verif" name="verif">

    <p>Entrez le code que vous avez reçu par mail</p>

    <button type="submit">Envoyer</button>
    <a href="../controller/index.php">Annuler</a>

</form>