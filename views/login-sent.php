<div class=login>
    <h1>Mot de passe oublié</h1>
    <form class="loginForm" action="<?php echo BASE_URL;?>/verifier/code" method="post">
        <input style="display:none" name="action" id="action" value="verifier" required="">

        <?php if (isset($_GET["echec"])){?>
            <p> Le code entré ne correspond pas </p>
        <?php } ?>

        
        <label for="verif">code reçu</label>
        <input type="text" id="verif" name="verif" required="">

        <p>Entrez le code que vous avez reçu par mail</p>

        <button class="boutton" type="submit">Envoyer</button>
        <a title="Retour vers le menu" href="<?php echo BASE_URL;?>/">Annuler</a>

    </form>
</div>