<h1>Modification <?php echo $_GET["service"] ?> </h1>
<div>
    <form action="../controller/modifService.php" action=POST>
        <input style="display:none" type="text" name="service" value=<?php echo $_GET["service"] ?>>
        <input type="text" name="content">
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>