<?php


// Configuration des paramètres de session
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 30); // 30 jours
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 30); // 30 jours
session_set_cookie_params(60 * 60 * 24 * 30, "/", "", false, true);


// Vérifier le cookie persistant
if (isset($_COOKIE["session_cookie"])) {
    session_id($_COOKIE["session_cookie"]);
    session_start();
    session_regenerate_id(true); // Régénérer l'ID de session pour plus de sécurité
    setcookie("session_cookie", session_id(), time() + (60 * 60 * 24 * 30), "/", "", false, true);
} else {
    session_start();
    session_regenerate_id(true);
    setcookie("session_cookie", session_id(), time() + (60 * 60 * 24 * 30), "/", "", false, true);
}



?>

