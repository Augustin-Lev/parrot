<h1>Modification <?php echo $service ?> </h1>
<div class="modif-service">
    <form action="<?php echo BASE_URL;?>/modifier" class="loginForm" method="POST">

        <input style="display:none" type="text" name="service" value=<?php echo $service ?>>
        <label for="titre">Titre</label>
        <input type="text" name="titre" require="">

        <label for="content">Contenu</label>
        <input class="grandTextInput" type="textarea" name="content" require="">

        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>