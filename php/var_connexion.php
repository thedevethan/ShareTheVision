<?php
$user;

function request_session($obj_connexion)    // La fonction servira a faire une requete préparée
{
    $stmt = $obj_connexion->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->execute();
    
    global $user;
    $user = $stmt->fetch(PDO::FETCH_ASSOC);    #User deviendra alors un tableau associatif
}

function connexion_session($path)    // La fonction servira a créer des variables de session avec les informations de l'utiliateur
{
    global $user;
    
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["id"] = $user["user_id"];
    $_SESSION["status"] = $user["status"];
    $_SESSION["autorisation"] = true;
    
    $cookie_value = session_id();
    setcookie("session_cookie", $cookie_value, time() + (60 * 60 * 24 * 30), "/");
    
    #Redirection après connexion réussie
    header("Location: " . $path . "catalog.php");
    exit();
}

?>