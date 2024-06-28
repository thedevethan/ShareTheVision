<!--header-->
<?php 
require("php/header.php");
hd('href="style.css"');
?>

<body>
    <!--navbar de la page du login-->
    <?php 
    require("php/navbar_login.php");
    nav_subscribe("Don't have an account?", "Sign Up", 'href = "php/signup_form.php"', 'src = "image/view.png"');
    ?>
    <!--formulaire de login-->
    <?php require("php/login_form.php");?>
</body>

</html>