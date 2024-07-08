<?php
ob_start();

require("php/session_config.php");

if (isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == true)
{
    header("Location: php/catalog.php");
    exit();  #Quitte le script si l'utilisateur est déjà connecté.
}

require("php/header.php");
hd('href="style.css"');

?>
<body>
    
    <!--navbar de la page du login-->
    <?php
    require("php/navbar_login.php");
    nav_subscribe("Vous n'avez pas de compte?", "Inscrivez-vous", 'href = "php/signup_form.php"', 'src = "image/view.png"');
    ?>
    
    <!--formulaire de login-->
    <?php 
    require("php/login_form.php"); 
    ?>
    
</body>

</html>
<?php

ob_end_flush();
?>