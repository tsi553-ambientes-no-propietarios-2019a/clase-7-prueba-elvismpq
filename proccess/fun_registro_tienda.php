<?php if ($_POST) {
    if(isset($_POST['shopname']) &&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['passagain']) && !empty($_POST['shopname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passagain'])){
        $tienda=$_POST['shopname'];
        $user=$_POST['username'];
        $pass1=MD5($_POST['password']);
        $pass2=MD5($_POST['passagain']);
        if ($pass1==$pass2) {
            $conn= new mysqli('localhost','root','12345','pruebab1');

            $sql="insert into tienda(shopname,username,password) values('$tienda','$user','$pass1')";
            $conn->query($sql);
            if($conn->error){
                header("Location: ../registro_tienda.php?error_message=El usuario $user ya existe!");
                exit;
            }else {
                header('Location: ../index.php?successful_message=Tienda registrada correctamente, puede iniciar sesión.');
                exit;
            }
        }else {
            header('Location: ../registro_tienda.php?error_message=Las contraseñas no coinciden!');
            exit;
        }

    }else {
        header('Location: ../registro_tienda.php?error_message=Ingrese todos los datos');
        exit;
    }
}