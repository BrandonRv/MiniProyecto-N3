connection.php
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("127.0.0.1", "root",  "", "login_db", 3307);
$mysqli->set_charset("utf8");
?>