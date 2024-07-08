<?php
ob_start();

require("session_config.php");

require("include.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $_POST["email"]);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);    #User deviendra alors un tableau associatif

            if ($user && password_verify($_POST["password"], $user["password"])) {

                #Les informations d'identification sont correctes
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["id"] = $user["user_id"];
                $_SESSION["status"] = $user["status"];
                $_SESSION["autorisation"] = true;

                $cookie_value = session_id();
                setcookie("session_cookie", $cookie_value, time() + (60 * 60 * 24 * 30), "/");

                #Redirection après connexion réussie
                header("Location: php/catalog.php");
                exit();
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
        <a href="php/signup_form.php">Inscrivez-vous</a>
    </div>

    <p class="login_error">
        Email ou mot de passe incorrect.
    </p>
    <script>
        $(".login_error").css("visibility", "hidden")
    </script>


    <div class="body_login">
        <input type="email" name="email" id="email" placeholder="email" maxlength="255" required>
        <input type="password" name="password" id="password" placeholder="mot de passe" maxlength="255" required>

        <div class="choice_login">
            <a href="#" class="forgot">
                Mot de passe oublié?
            </a>
            <input type="submit" id="sub_login" value="Se connecter">
        </div>
    </div>

</form>