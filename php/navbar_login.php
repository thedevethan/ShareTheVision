<?php


function nav_subscribe($text, $sign_log, $link, $img)
{
?>
    <nav>
        
        <div class="logo">
            <img <?php echo $img; ?> alt="eye_logo">
            <p class="name_site">ShareTheVision</p>
        </div>
        
        <div class="link">
            <p>
                <?php echo $text; ?>
            </p>
            <a <?php echo $link; ?> >
                <?php echo $sign_log; ?>
            </a>
        </div>

    </nav>
<?php
}

?>