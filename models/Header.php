<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="views/style\stylesheet.css">
        <link rel="stylesheet" href="views/style\stylesheet-tel.css">
        <link rel="stylesheet" href="views/style\carroussel.css">
        <?php if($header["javascript"] == "1") ?>
            <link rel="stylesheet" href="views/script\jquery-ui.theme.css">
            <link rel="stylesheet" href="views/script\jquery-ui.structure.css"> 
        <?php  ?>
        
        <title> <?php echo $header["titre"];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name= "description" content="
        <?php echo $header["content"];?>
        ">
    </head>

    <body>
        <?php if($header["javascript"]== "1"){ ?>
            <script src="views/script/code.jquery.com_jquery-3.7.0.min.js"></script>
            <script src="views/script/jquery-ui.min.js"></script>
            <script src="views/script/filtreOccasions.js"></script>
        <?php } ?>