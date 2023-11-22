<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $email_user = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $pass_user = $_POST["passw"];
    include("connection.php");

    try {
        $stmt_check = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt_check->bind_param("s", $email_user);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $_SESSION["error_rg"] = "Esta cuenta ya existe.";
            $stmt_check->close(); 
            redirect("../index.php");
        } else {
            $avatar = file_get_contents("../img/user.png");
            $nombre_user = 'Usuario';
            $info_bio = 'Biografia';
            $info_phone = '5555551234';
            $pass_user = password_hash($pass_user, PASSWORD_DEFAULT);
            $stmt_insert = $mysqli->prepare("INSERT INTO usuarios (nombre, bio, telefono, email, password, foto) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("ssssss", $nombre_user, $info_bio, $info_phone, $email_user, $pass_user, $avatar);
            $stmt_insert->execute();
            $stmt_insert->close();
            $user_data = get_user_data($mysqli, "email", $email_user);
            if ($user_data) {
                set_session_data($user_data);
            } 
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

?>
