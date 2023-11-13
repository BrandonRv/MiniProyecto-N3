<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["passw"];
    require_once("connection.php");

    try {
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            if (password_verify($password, $user["password"])) {
                set_session_data($user);
            } else {
                $_SESSION["error_x"] = "Contraseña o Email Incorrectos.";
                redirect("../login.php");
            }
        } else {
            $_SESSION["error_x"] = "No Esta Registrado.";
            redirect("../login.php");
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {

    try {
        session_start();
        $user_id = $_SESSION["user_id"];
        require_once("connection.php");
        
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i",  $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            set_session_data($user);
        } else {
            echo "Los Datos no se Actualizaron Correctamente";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function set_session_data($user)
{
    $_SESSION["datos"] = $user;
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["dato_nombre"] = $user["nombre"];
    $_SESSION["dato_bio"] = $user["bio"];
    $_SESSION["dato_telef"] = $user["telefono"];
    $_SESSION["dato_email"] = $user["email"];
    $_SESSION["dato_passw"] = $user["password"];
    $_SESSION["dato_imagen"] = $user["foto"];
    redirect("perfil-info.php");
}

function redirect($url)
{
    header("Location: $url");
    die();
}


