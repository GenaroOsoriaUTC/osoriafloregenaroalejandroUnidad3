<?php
    $data = file_get_contents("php://input");
    require "conexion.php";

    // Asegúrate de usar la misma variable de conexión (en este caso, $cnnPDO si es así en conexion.php)
    $query = $cnnPDO->prepare("SELECT * FROM productos WHERE id = :id");
    $query->bindParam(":id", $data, PDO::PARAM_INT); // Asegúrate de que sea un entero
    $query->execute();

    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>
