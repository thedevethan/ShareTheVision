<!DOCTYPE html>
<html lang="en">
<?php

function hd($style)
{
?>

    <head>
        <!--Encodage-->
        <meta charset="UTF-8">

        <!--Responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Style-->
        <link rel="stylesheet" <?php echo $style; ?>>
        <link rel="icon" href="image/view.png">

        <!--Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">

        <!--Mobile logo IOS-->
        <link rel="apple-touch-icon" sizes="57x57" href="https://sharethevision.000webhostapp.com/image/view257x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://sharethevision.000webhostapp.com/image/view260x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://sharethevision.000webhostapp.com/image/view272x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://sharethevision.000webhostapp.com/image/view2114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://sharethevision.000webhostapp.com/image/view2144x144.png">

        <!--Mobile logo android-->
        <link rel="icon" sizes="192x192" href="https://sharethevision.000webhostapp.com/image/view2192x192.png" />
        <!--Title-->
        <title>ShareTheVision</title>
    </head>
<?php
}

?>