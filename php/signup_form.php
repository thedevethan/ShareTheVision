<?php
ob_start();

require("session_config.php");

require("header.php");
hd("href = ../style.css");

require("include.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["username"]) && isset($_POST["dev"])) {
        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // L'adresse email à vérifier
            $emailToCheck = $_POST["email"];

            // Préparation de la requête SQL pour vérifier si l'email existe
            $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
            $stmt->bindParam(':email', $emailToCheck);
            $stmt->execute();

            // Récupération du nombre de lignes correspondant
            $count = $stmt->fetchColumn();

            // Vérification si l'email existe
            if ($count > 0 && $_POST["password"] != $_POST["confirm_password"]) {
                echo '<script>
                $(document).ready(function() {
                    $(".error_email, .error_password").css("visibility", "visible");
                });
                </script>';
            } else if ($_POST["password"] != $_POST["confirm_password"]) {
                echo '<script>
                $(document).ready(function() {
                    $(".error_password").css("visibility", "visible");
                });
                </script>';
            } else if ($count > 0) {
                echo '<script>
                $(document).ready(function() {
                    $(".error_email").css("visibility", "visible");
                });
                </script>';
            } else {
                $stmt = $conn->prepare("INSERT INTO user (email, password, username, status) VALUES (:email, :password, :username, :status)");

                $phash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $stmt->bindParam(':email', $_POST["email"]);
                $stmt->bindParam(':password', $phash);
                $stmt->bindParam(":username", $_POST["username"]);
                $stmt->bindParam(":status", $_POST["dev"]);

                $stmt->execute();

                header("Location: ../index.php");

                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
ob_end_flush();
?>

<body>

    <!--navbar de la page du signup-->
    <?php
    require("navbar_login.php");
    nav_subscribe("Déjà un compte?", "Connectez-vous", 'href = "../index.php"', 'src = "../image/view.png"');
    ?>

    <!--Formulaire de la page du signup-->
    <form action="signup_form.php" class="signup" method="post">

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

            <input type="text" name="username" id="username" placeholder="nom d'utilisateur" maxlength="15" required>

            <div class="error_email">
                <p>
                    L'email appartient déjà à un compte.
                </p>
            </div>

            <input type="email" name="email" id="email" placeholder="email" maxlength="255" required>

            <div class="password_container">
                <input type="password" name="password" id="password" placeholder="mot de passe" maxlength="255" required>

                <img src="../image/show.png" alt="show" id="im1">
            </div>

            <div class="error_password">
                <p>
                    Mot de passe incorrect.
                </p>
            </div>

            <div class="password_container">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmer le mot de passe" maxlength="255" required>

                <img src="../image/show.png" alt="show" id="im2">
            </div>

            <!--Fonction qui permet de cacher le mot de passe lors du click sur l'icône-->
            <?php 
            require("hide_password.php");
            echo '<script>
            $(document).ready(function() {
                hide_password("#im1", "#password", "../");
                hide_password("#im2", "#confirm_password", "../");
            });
            </script>';
            ?>

            <!--Permet de cacher par défaut les messages d'erreurs-->
            <script>
                $(".error_password, .error_email").css("visibility", "hidden")
            </script>
        </div>
        <p id="info_dev">Seuls les développeurs peuvent publier des logiciels.</p>
        <div class="dev_choice">

            <p class="label_dev">Développeur:</p>
            <div class="status">
                <input type="radio" name="dev" id="oui" value="oui" required>
                <label for="oui">Oui</label>
                <input type="radio" name="dev" id="non" value="non" required>
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