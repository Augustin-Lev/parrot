<h1>Modification <?php echo $service ?> </h1>
<div class="modif-service">
    <form action="<?php echo BASE_URL;?>/modifier" class="loginForm" method="POST">

        <input style="display:none" type="text" name="service" value=<?php echo $service ?>>
        <label for="titre">Titre</label>
        <input type="text" value ="<?php echo $TitreService ?>" name="titre" require="">

        <label for="content">Contenu</label>
        <textarea class="grandTextInput"  type="textarea" name="content" require=""><?php echo $ContenuService ?></textarea>

        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>