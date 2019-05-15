<?php
session_start();
if(!empty($_SESSION)){
$idtienda=$_SESSION['user']['id'];
}else{
    header('Location: index.php');
    exit;
}


    $conn= new mysqli('localhost','root','12345','pruebab1');

    if ($conn->connect_error) {
        echo 'Error en la conexion '. $conn->connect_error;
    }

    $sql="select * from producto where idtienda='$idtienda'";
    $res=$conn->query($sql);
    

    if($conn->error){
        header('Location: index.php?error_message=Ocurrió un error: '.$conn->error);
        exit;
    }
    
            
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php
echo 'Bienvenido ';
print_r($_SESSION['user']['username']);
echo '<br>Tienda: ';
print_r($_SESSION['user']['tienda']);?>
<center><h1>Productos</h1></center>
<div class="row">
    <div class="col-sm">
    <a href="nuevo_producto.php">Agregar nuevo producto</a>
    </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
      <a href="proccess/cerrarSesion.php">Cerrar Sesión</a>
    </div>
  </div>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cod</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Cantidad en stock</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($res->num_rows> 0 ) {
        while($row=$res->fetch_assoc()) {?>
  <tr>
      <th scope="row"><?php print_r($row['codprod']);?></th>
      <td><?php print_r($row['nameprod']); ?></td>
      <td><?php print_r($row['typeprod']); ?></td>
      <td><?php print_r($row['stock']); ?></td>
      <td><?php print_r($row['precio']); ?></td>
    </tr>
  <?php
        }
}else {
    echo 'No hay productos<br>';
    

}
  ?>
    
</table>

</div>
</body>
</html>