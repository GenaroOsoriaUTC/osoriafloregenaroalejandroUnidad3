<?php
if (isset($_POST)) {
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    require("conexion.php"); // Incluye el archivo de conexión

    if (empty($_POST['idp'])){
        $query = $cnnPDO->prepare("INSERT INTO productos (codigo, producto, precio, cantidad) VALUES (:cod, :pro, :pre, :cant)");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->execute();
        $cnnPDO = null; // Cierra la conexión
        echo "ok";
    } else {
        $id = $_POST['idp'];
        $query = $cnnPDO->prepare("UPDATE productos SET codigo = :cod, producto = :pro, precio =:pre, cantidad = :cant WHERE id = :id");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->bindParam(":id", $id); // Corrige la sintaxis ":id"
        $query->execute();
        $cnnPDO = null; // Cierra la conexión
        echo "modificado";
    }
}
