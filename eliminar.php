<?php
    $data = file_get_contents("php://input");
    require "conexion.php"; // Asegúrate de usar la variable correcta

    // Verificar si $data es un número entero
    $data = intval($data);

    if ($data) {
        $query = $cnnPDO->prepare("DELETE FROM productos WHERE id = :id");
        $query->bindParam(":id", $data, PDO::PARAM_INT);
        
        if ($query->execute()) {
            echo "ok";
        } else {
            echo "Error al eliminar el registro";
        }
    } else {
        echo "ID no válido";
    }
?>
