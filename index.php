<?php
if (file_exists('model/log.csv')){
    header("Location:controller/index.php");
}else{
    header("Location:model/init.php");
}

?>