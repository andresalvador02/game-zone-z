<?php
// config/db.sample.php - sample DB config (do NOT commit real credentials)
$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$DB_NAME = getenv('DB_NAME') ?: 'gamezone';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    error_log("DB connect error: " . $mysqli->connect_error);
    die("Error de conexión a la base de datos. Revisa config/db.php");
}
$mysqli->set_charset('utf8mb4');
