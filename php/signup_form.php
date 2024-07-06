<!--header-->
<?php



require("session_config.php");

require("header.php");
hd("href = ../style.css");

require("include.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["dev"])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("INSERT INTO user (email, password, username, status) VALUES (:email, :password, :username, :status)");
            $stmt->bindParam(':email', $_POST["email"]);
            $stmt->bindParam(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
            $stmt->bindParam(":username", $_POST["username"]);
            $stmt->bindParam(":status", $_POST["dev"]);
            
            $stmt->execute();
            
            header("Location: ../index.php");
            
            exit();
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
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
            <input type="email" name="email" id="email" placeholder="email" maxlength="255" required>
            <input type="password" name="password" id="password" placeholder="mot de passe" maxlength="255" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmer le mot de passe" maxlength="255" required>
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