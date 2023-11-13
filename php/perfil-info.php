<?php
session_start();
if (!isset($_SESSION["datos"])) {
    echo "NO TE HAS LOGUEADO !";
    die();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9fa9845ee1.js" crossorigin=“anonymous”></script>
    <script src="../js/modo-oscuro.js" defer></script>
    <script src="../js/popoverSpin.js" defer></script>
    <title>Informacion Personal</title>
</head>
<html>

<body id="infoPerson">
    <nav id="navigator">
        <div>
            <img id="logo-info" alt="devchallenges.svg" />
        </div>
        <div>
        <div id="open" class="w-8 h-8  md:w-fit flex  justify-between items-center">
        <div>
            <?php
            echo "<img class='h-8 w-8'  style='width: 2rem' src='data:image/jpg; base64," . base64_encode($_SESSION["dato_imagen"]) . "'>";
            ?>
        </div>

            <p class="list-popover"> &#160; <?php echo $_SESSION["dato_nombre"] ?></p>
            <button onclick="popoverSpin()">
                <svg id="triangulito-spin" style="transition-duration: 500ms;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 30 10">
                    <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z" />
                </svg>
            </button>
        </div>
        <div id="toggle" class="ghfh">
            <ul>
                <div class="listPopover">
                    <a class="flex lisst" href="perfil-info.php">
                    <i class="fa-solid fa-user" style="color: #8c8c8c;"> &#160; &#160; </i><li class="list-popover">My Profile</li>
                    </a>
                </div>
                <div class="listPopover">
                    <a class="flex lisst" href="#">
                    <i class="fa-solid fa-user-group" style="color: #8c8c8c;"> &#160;</i><li class="list-popover">Group Chat</li>
                    </a>
                </div>
                <div class="listPopover">
                    <button onclick="ejecutarCambiarModo()" class="flex lisst">
                    <i id="switchInfo"> &#160; &#160; </i><li id="modoTexto" class="list-popover">Dark Mode</li>
                    </button>
                </div>
                <hr>
                <div class="listPopover">
                    <a class="flex lisst" href="logout.php">
                    <i class="fa-solid fa-right-from-bracket" style="color: #c70000;">&#160; &#160;</i><li class="list-popover">Log out</li>
                    </a>
                </div>
            </ul>
        </div>
        </div>
    </nav>


<div id="formularioInfo">

<form id="table-info" class="w-full " action="update_data.php">
        <h1 class="mb-2 mt-4 colorPar">Personal info</h1>
        <p class="mb-6 colorPar">Basic info, like your name and photo</p>

        <div id="conInfoForm"  class="border-solid border-2">

            <div class="px-6 md:px-20 h-24 w-full flex justify-between items-center border-b border-gray">
                <div>
                    <p class="text-lg">Profile</p>
                    <p class="text-xs text-gray-400 w-44 md:w-full">Some info may be visible to other people</p>
                </div>
                <button class="bg-white hover:bg-gray-300 text-gray-500 border border-gray-400  py-2 px-8 rounded-lg" type="submit">Edit</button>
            </div>
            <div class="px-6 md:px-20 h-16 w-full flex border-b border-gray md:justify-normal justify-between items-center">
                <p class="w-2/6 h-full flex items-center text-gray-400 text-sm">PHOTO</p>
                <div 
                class="border rounded-md h-12 w-12 overflow-hidden"  style="width: 100px;">
                    <?php
                    echo "<img class='h-12 w-12' src='data:image/jpg; base64," . base64_encode($_SESSION["dato_imagen"]) . "'>";
                    ?>
                </div>
            </div>

            <div class="flex inputData">
                <p class=" flex items-center">NAME</p>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_nombre"] ?>" 
                size="20" 
                disabled />
            </div>

            <div class="flex inputData">
                <p class="w-2/6 h-full flex items-center">BIO</p>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_bio"] ?>" 
                disabled 
                />
            </div>

            <div class="flex inputData">
                <p class="w-2/6 h-full flex items-center">PHONE</p>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_telef"] ?>" 
                size="20" 
                disabled
                />
            </div>

            <div class="flex inputData" >
                <p class="w-2/6 h-full flex items-center">EMAIL</p>
                <input 
                class="input-form" 
                type="text" 
                value="<?php echo $_SESSION["dato_email"] ?>" 
                placeholder="Escriba su email" 
                disabled 
                />
            </div>

            <div class="flex inputData">
                <p class="w-2/6 h-full flex items-center">PASSSWORD</p>
                <input 
                class="input-form"
                type="password" 
                value="<?php echo $_SESSION["dato_passw"] ?>" 
                placeholder="Escriba su password" 
                size="20" 
                disabled
                />
            </div>
        </div>
        <div id="contenedor-footer">
            <p class="text-sm">create by <a href="https://github.com/BrandonRv">BrandonRv</a></p>
            <p class="text-sm">devChallenges.io</p>
        </div>

    </form>


    </div>




</body>

<script>
    function ejecutarCambiarModo() {
    textModel()
    cambiarModo();  
    }
</script>

</html>


<!-- <body>
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
        <button id="switch"></button>
        <div id="contenedor-footer">
            <p>create by <a class="text-footer" href="https://github.com/BrandonRv">BrandonRv</a></p>
            <p>devChallenges.io</p>
        </div>
    </div>
</body> -->