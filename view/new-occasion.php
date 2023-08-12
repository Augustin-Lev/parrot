<form class="new_occasion" action="../controller/administration.php" method=POST>
    <?php 
        // var_dump($occasions);
        foreach($occasions as $parametre){
            if (key($occasions) == "id" || key($occasions) == "modificateur"){
                next($occasions);
            }else{

            ?>
            <div>
                <label for="<?php echo key($occasions);  ?>"><?php echo key($occasions);  ?></label>
                <input type="text"  name="<?php echo key($occasions);  ?>">
            </div>
           <?php 
                next($occasions);
            }
        }
    ?>
    <input style="display:none" type="text" name="action" value="ajout-new-occasion">

    <button class="boutton" type="submit">Ajouter</button>
</form>