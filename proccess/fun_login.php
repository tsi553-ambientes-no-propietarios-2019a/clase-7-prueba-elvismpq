<?php
session_start();
if($_POST){
    if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
        $username=$_POST['username'];
        $pass=MD5($_POST['password']);
        $conn= new mysqli('localhost','root','12345','pruebab1');

        $sql="select * from tienda where username= '$username' and password='$pass'";

        $res=$conn->query($sql);
        if ($res->num_rows> 0 ) {
            while ($row=$res->fetch_assoc()) {
                $_SESSION['user']=[
                'username'=>$row['username'],
                'id'=>$row['idtienda'],
            'tienda'=>$row['shopname']];    
            }
            header('Location: ../inicio.php');
        }else {
            header('Location: ../index.php?error_message= Usuario o clave incorrectas!');
            exit;
        }
    }else{
        header('Location: ../index.php?error_message=Ingrese los datos!');
    }
}else{
    header('Location: ../index.php');
}
?>