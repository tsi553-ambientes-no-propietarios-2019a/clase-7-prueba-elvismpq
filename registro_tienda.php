<?php
if($_GET){
    if (isset($_GET['error_message'])) {
        $error_message=$_GET['error_message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form action="process/fun_registro_tienda.php" method="post">
    <b><h4>Registro de tienda</h4></b>
    Nombre de la tienda: <input type="text" name="shopname"><br>
    Nombre de usuario: <input type="text" name="username"><br>
    Ingrese una contraseña: <input type="password" name="password"><br>
    Ingrese la contraseña nuevamente:<input type="password" name="passagain"><br>
        <input type="submit" value="Registrarse"></form>
        <a href="index.php">Iniciar Sesión</a><br>
        <?php 
    if (isset($error_message)) {
      echo '<strong>'.$error_message.'</strong>';
      }?>
</body>
</html>