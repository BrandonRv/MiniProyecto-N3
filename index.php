<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <!-- <link href="./css/styles.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9fa9845ee1.js" crossorigin=“anonymous”></script>
    <script src="./js/modo-oscuro.js" defer></script>
    <title>Register</title>
</head>
<body id="body-star">
    <div id="container-1" class="border-solid border-2">
        <div id="contenedor-2">
            <img id="logo" alt="devchallenges.png"/>
            <br>
            <h2 class="text-xl font-semibold">Join thousands of learners from around the world</h2><br>
            <h3 class="text-sm">Master web development by making real-life projects. There are multiple paths for
                you to choose</h3>
        </div>
        <form id="form-1" action="./php/login-db.php" method="post" enctype="multipart/form-data">
            <i class="fa-solid fa-envelope fa-xl"></i>
            <input class="user-name  text-gray-700" type="text" name="email" placeholder="Email" required/>
            <i class="fa-solid fa-lock fa-xl"></i>
            <input class="user-name" type="password" name="passw" placeholder="Password" required/>
            <p class="text-xs p-2  text-red-700">
                <?php
                if (isset($_SESSION["error_rg"])) {
                    echo $_SESSION["error_rg"];
                };
                unset($_SESSION["error_rg"]);
                ?>
            </p>
            <button type="submit" id="button-log">Star coding now</button>
        </form>
        <div id="container-3">
            <p>or continue with these social profile</p>
        </div>
        <div id="container-btn" class="flex">
            <a href="#"><img src="./assets/google.svg" alt="google.svg" /></a>
            <a href="#"><img src="./assets/Facebook.svg" alt="Facebook.svg" /></a>
            <a href="#"><img src="./assets/Twitter.svg" alt="Twitter.svg" /></a>
            <a href="#"><img src="./assets/Gihub.svg" alt="Gihub.svg" /></a>
        </div>
        <div id="contenedor-4">
            <p>Already a member? </p>
            <p><a href="./login.php">&#160;Login</a></p>
        </div>
        <button id="switch" onclick="cambiarModo()" ></button>
        <div id="contenedor-footer">
            <p>create by <a class="text-footer" href="https://github.com/BrandonRv">BrandonRv</a></p>
            <p>devChallenges.io</p>
        </div>
    </div>
</body>
</html>