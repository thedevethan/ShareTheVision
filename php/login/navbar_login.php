<?php

function nav_subscribe($text, $sign_log)
{
?>
    <nav>

        <div class="logo">
            <img src="image/view.png" alt="eye_logo" height="35">
            <p class="name_site">ShareTheVision</p>
        </div>

        <div class="link">
            <p>
                <?php echo $text; ?>
            </p>
            <a href="#">
                <?php echo $sign_log; ?>
            </a>
        </div>

    </nav>
<?php
}

nav_subscribe("Don't have an account?", "Sign Up")


?>