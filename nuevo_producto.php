<?php 
session_start();
if(empty($_SESSION)){
    header('Location: index.php');
    exit;
}
    if($_GET){
        if (isset($_GET['error_message'])) {
            $error_message=$_GET['error_message'];
        }
    

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Producto</title>
</head>
<body>
    <form action="proccess/fun_nuevo_producto.php" method="post">
    Código: <input type="text" name="codigo"><br>
    Nombre:<input type="text"name="nombre"><br>
    Tipo: <select name="tipo">
    <option value="Alimento">Alimento</option>
    <option value="Vestimenta">Vestimenta</option>
    <option value="Salud">Salud</option>
    </select><br>
    Cantidad: <input type="text" name="stock"><br>
    Precio:<input type="text" name="precio"><br>
    <input type="submit" value="Registrar">
    </form>
<a href="inicio.php">Ver Productos</a>
    <?php

    if (isset($error_message)) {
        echo '<strong>'.$error_message.'</strong>';
        }?>
</body>
</html>