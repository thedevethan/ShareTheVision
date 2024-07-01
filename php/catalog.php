<?php
require("header.php");
hd("href = ../style.css")
?>


<body>

    <nav>
        <div class="logo">
            <img src="../image/view.png" alt="eye_logo" height="35">
            <p class="name_site">ShareTheVision</p>
        </div>

        <div class="account">
            <img class="user" src="../image/user.png" alt="user" height="35">
        </div>
    </nav>

    <div class="menu">
        <div class="headermenu">

            <div class="usernamemenu">
                <img class="user" src="../image/user.png" alt="user" height="35">
                <p>
                    usernameeeeeeee
                </p>
            </div>
            <img class="close" src="../image/close.png" alt="close" height="20">
        </div>

        <ul>
            <li><a href="#">Mon compte</a></li>
            <li><a href="#">Mes applications</a></li>
            <li><a href="#">Application mobile</a></li>
            <li><a href="#">Se déconnecter</a></li>
        </ul>
    </div>

    <script>
        $(".account").click(function() {
            $(".menu").animate({left: '83vw'}, 100);
        });
        $(".close").click(function() {
            $(".menu").animate({left: '100vw'}, 100);
        });
    </script>
</body>

</html>