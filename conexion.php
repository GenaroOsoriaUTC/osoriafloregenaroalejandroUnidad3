<?php
$servidor = "mysql:dbname=crud;host=localhost";
$user = "root";
$pass = "";
try {
    $cnnPDO = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $cnnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conexion fallida: " . $e->getMessage();
    exit();
}
?>
