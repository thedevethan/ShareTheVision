<?php
ob_start();

require("session_config.php");

function nav_subscribe($text, $sign_log, $link, $img)    // La fonction permet de créer la barre de navigation 
{
?>
    <nav>

        <div class="logo">
            <img <?php echo $img; ?> alt="eye_logo">
            <p class="name_site">ShareTheVision</p>
        </div>

        <script>
            // Script pour le clic sur le logo, rechargement de la page
            $(document).ready(function() {
                $(".logo img").click(function() {
                    location.reload();
                });
            });
        </script>

        

        <div class="link">
            <p>
                <?php echo $text; ?>
            </p>
            <a <?php echo $link; ?>>
                <?php echo $sign_log; ?>
            </a>
        </div>

    </nav>
<?php
}
// Pas de fermeture de la balise PHP pour éviter les espaces blancs
// ob_end_flush(); peut être omis ici si ce fichier est inclus
