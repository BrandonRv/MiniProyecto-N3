<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["passw"];
    include("connection.php");

    try {
        $user = get_user_data($mysqli, "email", $email);
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
        include("connection.php");
        $user = get_user_data($mysqli, "id", $user_id);
        if ($user) {
            set_session_data($user);
        } else {
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function get_user_data($mysqli, $field, $value) {
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE $field = ?");
    $stmt->bind_param(get_bind_type($value), $value);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}
function get_bind_type($value) {
    switch (gettype($value)) {
        case "integer":
            return "i";
        case "double":
            return "d";
        case "string":
            return "s";
        default:
            return "b";
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
$mysqli->close();
