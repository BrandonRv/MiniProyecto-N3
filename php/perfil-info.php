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
            echo "<img id='imgperfilin' class='h-8 w-8'  style='width: 2rem' src='data:image/jpg; base64," . base64_encode($_SESSION["dato_imagen"]) . "'>";
            ?>
        </div>
            <p class="list-popover"> &#160; <?php echo $_SESSION["dato_nombre"] ?></p>
            <button onclick="popoverSpin()">
                <svg id="triangulito-spin" style="transition-duration: 500ms;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 30 10">
                    <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z" />
                </svg>
            </button>
        </div>
        <div id="toggle">
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
    <div id="formularioInfo" class="justify-between items-center">
<form id="table-info" action="update_data.php">
<div id="conInfoForm2" >
<div id="tituloform2">
        <h1>Personal info</h1>
        <p>Basic info, like your name and photo</p>
        </div>
        <div id="conInfoForm">
            <div id="titleForm" class="flex">
                <div id="profileForm">
                    <p class="text-lg">Profile</p>
                    <p class="text-xs">Some info may be visible to other people</p>
                </div>
            <div class="botoneditar">
                <button id="botonEdit" type="submit">Edit</button>
                </div>
            </div>
            <div id="inputData" class="inputData">
                <p class="w-2/6 h-full flex items-center">PHOTO</p>
                <div>
                <div id="imgDiv"
                class="border rounded-md h-12 w-12 overflow-hidden"  
                style="width: 48px;">
                    <?php
                    echo "<img 
                    id='imgForm' 
                    class='h-12 w-12' 
                    src='data:image/jpg; base64," . base64_encode($_SESSION["dato_imagen"]) . "'>";
                    ?>
                </div>
                </div>
            </div>
            <div class="inputData">
                <p class="w-2/6 h-full flex items-center">NAME</p>
                <div>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_nombre"] ?>" 
                size="20" 
                disabled />
                </div>
            </div>
            <div class="inputData">
                <p class="w-2/6 h-full flex items-center">BIO</p>
                <div>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_bio"] ?>" 
                disabled 
                />
                </div>
            </div>
            <div class="inputData">
                <p class="w-2/6 h-full flex items-center">PHONE</p>
                <div>
                <input 
                class="input-form"
                type="text" 
                value="<?php echo $_SESSION["dato_telef"] ?>" 
                size="20" 
                disabled
                />
                </div>
            </div>
            <div class="inputData" >
                <p class="w-2/6 h-full flex items-center">EMAIL</p>
                <div>
                <input 
                class="input-form" 
                type="text" 
                value="<?php echo $_SESSION["dato_email"] ?>" 
                placeholder="Escriba su email" 
                disabled 
                />
                </div>
            </div>
            <div id="ultimopasw" class="inputData">
                <p class="w-2/6 h-full flex items-center">PASSSWORD</p>
                <div>
                <input 
                class="input-form"
                type="password" 
                value="************" 
                placeholder="Escriba su password" 
                size="20" 
                disabled
                />
                </div>
            </div>
        </div>
        </div>
        <div
        id="contenedor-footer"
        >
        <!-- id="contenedor-footer" -->
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
