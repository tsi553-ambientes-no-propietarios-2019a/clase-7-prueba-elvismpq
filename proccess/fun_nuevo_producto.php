<?php
session_start();
 if ($_POST) {
    if(isset($_POST['codigo']) &&isset($_POST['nombre'])&&isset($_POST['tipo'])&&isset($_POST['stock']) &&isset($_POST['precio'])&& !empty($_POST['codigo']) && !empty($_POST['nombre']) && !empty($_POST['tipo']) && !empty($_POST['stock'])&&!empty($_POST['precio'])){
        
        $cod=$_POST['codigo'];
        $nom=$_POST['nombre'];
        $tip=$_POST['tipo'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio'];
        $idtienda=$_SESSION['user']['id'];
            $conn= new mysqli('localhost','root','12345','pruebab1');
            $sql="insert into producto(codprod,nameprod,typeprod,stock,precio,idtienda) values('$cod','$nom','$tip','$stock','$precio','$idtienda')";
            $conn->query($sql);
            if($conn->error){
                header("Location: ../nuevo_producto.php?error_message=$conn->error");
                exit;
            }else {
                header('Location: ../inicio.php?successful_message=Prducto registrado exitosamente!');
                exit;
            }
        

    }else {
        header('Location: ../nuevo_producto.php?error_message=Por favor,llene todos los datos');
        exit;
    }
}
?>