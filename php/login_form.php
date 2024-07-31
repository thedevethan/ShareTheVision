<?php
ob_start();

require("session_config.php");

require("include.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            require("var_connexion.php");
            request_session($conn);

            if ($user && password_verify($_POST["password"], $user["password"])) {

                #Les informations d'identification sont correctes
                connexion_session("php/");
            } else {
                #Les informations d'identification sont incorrectes
                echo '<script>
                    $(document).ready(function() {
                        $(".login_error").css("visibility", "visible");
                    });
                    </script>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}

ob_end_flush();
?>

<form class="login" action="index.php" method="post">

    <p class="log">Se connecter</p>
    <div class="log_sign_up">
        <p>
            Vous n'avez pas de compte?
        </p>

        <div>
            <a href="php/signup_form.php">Inscrivez-vous</a>
        </div>

    </div>

    <p class="login_error">
        Email ou mot de passe incorrect.
    </p>
    <script>
        $(".login_error").css("visibility", "hidden")
    </script>


    <div class="body_login">
        <input type="email" name="email" id="email" placeholder="email" maxlength="255" required>

        <div class="password_container">
            <input type="password" name="password" id="password" placeholder="mot de passe" maxlength="255" required>

            <img src="image/show.png" alt="show" id="im3">
        </div>

        <!--Fonction qui permet de cacher le mot de passe lors du click sur l'icône-->
        <?php
        require("hide_password.php");
        echo '<script>
            $(document).ready(function() {
                hide_password("#im3", "#password", "");
            });
            </script>';
        ?>

        <div class="choice_login">

            <div class="forgot">
                <a href="#" >
                    Mot de passe oublié?
                </a>
            </div>

            <input type="submit" id="sub_login" value="Se connecter">
        </div>
    </div>

</form>