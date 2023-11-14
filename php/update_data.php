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
    <!-- <link href="./css/styles.css" rel="stylesheet"> -->
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
                    <svg id="triangulito-spin" style="transition-duration: 500ms;" class="md:visible collapse w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 30 10">
                        <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z" />
                    </svg>
                </button>
            </div>
            <div id="toggle" class="ghfh">
                <ul>
                    <div class="listPopover">
                        <a class="flex lisst" href="perfil-info.php">
                            <i class="fa-solid fa-user" style="color: #8c8c8c;"> &#160; &#160; </i>
                            <li class="list-popover">My Profile</li>
                        </a>
                    </div>
                    <div class="listPopover">
                        <a class="flex lisst" href="#">
                            <i class="fa-solid fa-user-group" style="color: #8c8c8c;"> &#160;</i>
                            <li class="list-popover">Group Chat</li>
                        </a>
                    </div>
                    <div class="listPopover">
                        <button onclick="ejecutarCambiarModo()" class="flex lisst">
                            <i id="switchInfo"> &#160; &#160; </i>
                            <li id="modoTexto" class="list-popover">Dark Mode</li>
                        </button>
                    </div>
                    <hr>
                    <div class="listPopover">
                        <a class="flex lisst" href="logout.php">
                            <i class="fa-solid fa-right-from-bracket" style="color: #c70000;">&#160; &#160;</i>
                            <li class="list-popover">Log out</li>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <button id="buttonback" href="perfil-info.php">&#60;&#160;Back</button> 
    <div id="formularioInfo" class="justify-between items-center">
        <form id="table-info" class="#" method="POST" action="update_db.php" enctype="multipart/form-data">
            <div id="conInfoForm" class="border-solid border-2">
                <div id="tituloform">
                    <p class="text-lg">Change Info</p>
                    <p class="text-xs text-gray-400">Changes will be reflected to every services</p>
                </div>
                <div class="divDataIn">
                    <div class="rounded-md">
                        <?php
                        echo '<img 
                    type="image" 
                    style="opacity: 40%;" 
                    class="h-12 w-12 hover:bg-gray-300 text-gray-500 border border-gray-400 rounded-lg " 
                    width="48" 
                    height="48" 
                    id="image" 
                    alt="photo" 
                    src="data:image/jpg; base64,' . base64_encode($_SESSION['dato_imagen']) . '" 
                    disabled
                    >';
                        ?>
                    </div>
                    <div class="flex">
                        <i class="fa-solid fa-camera-retro fa-lg"></i>
                        <input 
                        class=" w-1" 
                        type="file" 
                        id="archivo" 
                        accept="image/*" 
                        class="fancy-file" 
                        name="newFoto" 
                        required
                        />
                        <label class="flex justify-center items-centercursor-pointer absolute" for="archivo">
                            <span>CHANGE PHOTO</span>
                        </label>
                    </div>
                    <p class="border text-center  text-red-700">&#160;
                        <?php
                        if (isset($_SESSION["error_nophoto"])) {
                            echo $_SESSION["error_nophoto"];
                        };
                        unset($_SESSION["error_nophoto"]);
                        ?>
                    </p>
                </div>
                <div class="divDataIn">
                    <p class="w-2/6 h-full flex items-center">Name</p>
                    <input 
                    class="input-form2" 
                    type="text" 
                    value="<?php echo $_SESSION["dato_nombre"] ?>" 
                    placeholder="Escriba su Nombre" 
                    size="20" 
                    name="newNombre" 
                    required 
                    />
                </div>
                <br>
                <div class="divDataIn">
                    <p class="w-2/6 h-full flex items-center">Bio</p>
                    <input 
                    class="input-form2" 
                    type="text" 
                    value="<?php echo $_SESSION["dato_bio"] ?>" 
                    placeholder="Escriba su Biografia" 
                    name="newBio" 
                    required 
                    />
                </div>
                <br>
                <div class="divDataIn">
                    <p class="w-2/6 h-full flex items-center">Phone</p>
                    <input 
                    class="input-form2" 
                    type="text" 
                    value="<?php echo $_SESSION["dato_telef"] ?>" 
                    placeholder="Example: 57315551234" 
                    size="20" 
                    name="newTelef" 
                    required 
                    />
                </div>
                <br>
                <div class="divDataIn">
                    <p class="flex items-center">Email</p>
                    <p class="text-center  text-red-700">&#160;
                        <!-- <?php
                        if (isset($_SESSION["error_update"])) {
                            echo $_SESSION["error_update"];
                        };
                        unset($_SESSION["error_update"]);
                        ?>
                    </p> -->
                    <input 
                    class="input-form2" 
                    type="text" 
                    value="<?php echo $_SESSION["dato_email"] ?>" 
                    placeholder="someone@example.com" 
                    name="newEmail" 
                    required 
                    />
                </div>
                <br>
                <div class="divDataIn">
                    <p class="flex items-center">Password</p>
                    <input 
                    class="input-form2" 
                    type="password" 
                    placeholder="Escriba su Nueva Contraseña" 
                    size="20" 
                    name="newPassw" 
                    required 
                    />
                </div>
                <br>
                <div class="listPopover2">
                    <button type="submit">Save</button>
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