<h1>Modification <?php echo $_GET["service"] ?> </h1>
<div class="modif-service">
    <form action="../controller/modifService.php" class="loginForm" method="POST">

        <input style="display:none" type="text" name="service" value=<?php echo $_GET["service"] ?>>
        <label for="titre">Titre</label>
        <input type="text" name="titre" require="">

        <label for="content">Contenu</label>
        <input class="grandTextInput" type="textarea" name="content" require="">

        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>