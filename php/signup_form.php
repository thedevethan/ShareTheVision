<!--header-->
<?php
require("header.php");
hd("href = ../style.css")
?>

<body>
    <!--navbar de la page du signup-->
    <?php
    require("navbar_login.php");
    nav_subscribe("Déjà un compte?", "Connectez-vous", 'href = "../index.php"', 'src = "../image/view.png"');
    ?>

    <form action="#" class="signup">

        <p class="sign">
            Créer un compte
        </p>

        <div class="sign_up_log">
            <p>
                Vous avez déjà un compte?
            </p>
            <a href="../index.php">connectez-vous</a>
        </div>

        <div class="body_signup">

            <input type="text" name="username" id="username" placeholder="nom d'utilisateur" maxlength="255" required>
            <input type="email" name="email" id="email" placeholder="email" maxlength="255" required>
            <input type="password" name="password" id="password" placeholder="mot de passe" maxlength="255" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmer le mot de passe" maxlength="255" required>
        </div>
        <p id="info_dev">Seuls les développeurs peuvent publier des logiciels.</p>
        <div class="dev_choice">

            <p class="label_dev">Développeur:</p>
            <div class="status">
                <input type="radio" name="dev" id="oui">
                <label for="oui">Oui</label>
                <input type="radio" name="dev" id="non">
                <label for="non">Non</label>
            </div>
        </div>

        <input type="submit" id="sub_signup" value="Créer un compte">

        <script>
            $("#info_dev").css("visibility", "hidden")

            $("#non").click(
                function() {
                    $("#info_dev").css("visibility", "visible");
                }
            )

            $("#oui").click(
                function() {
                    $("#info_dev").css("visibility", "hidden");
                }
            )
        </script>


    </form>

</body>

</html>