<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require("connection.php");

    $photo = $_FILES["newFoto"] ?? null;
    $name = $_POST["newNombre"];
    $bio = $_POST["newBio"];
    $phone = $_POST["newTelef"];
    $email = $_POST["newEmail"];
    $password = $_POST["newPassw"];
    $user_id = $_SESSION["user_id"];
    $email = $_SESSION["dato_email"];
 
    if ($photo) {
        $image_info = getimagesize($photo["tmp_name"]);
        if ($image_info === false) {
            $_SESSION["error_nophoto"] = "El archivo no es una imagen válida";
            redirect("update_data.php");
        }
        $photo_content = file_get_contents($photo["tmp_name"]);
    } else {
        $photo_content = "";
        $_SESSION["error_nophoto"] = "Agregue una Foto";
        redirect("update_data.php");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt_check = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ? AND NOT id = ?");
        $stmt_check->bind_param("si", $email, $user_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $num_rows = $result_check->num_rows;
        $stmt_check->close();

        if ($num_rows > 0) {
            $_SESSION["error_update"] = "Este Email ya Existe!";
            redirect("update_data.php");
        }
        $stmt_update = $mysqli->prepare("UPDATE usuarios SET foto = ?, nombre = ?, bio = ?, telefono = ?, email = ?, password = ? WHERE id = ?");
        $stmt_update->bind_param("ssssssi", $photo_content, $name, $bio, $phone, $email, $hashed_password, $user_id);
        $stmt_update->execute();
        $stmt_update->close();
        redirect("autenticacion.php");
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function redirect($url) {
    header("Location: $url");
    die();
}
