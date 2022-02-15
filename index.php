<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c49ed490f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<form action="index.php" method="post" id="formulario">
    <h4>Introduce tus datos</h4>
    <div class="form-group" >
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">👤</span>
            </div>
            <label for="usuario"></label>
            <input type="text" class="form-control" placeholder="Usuario"  name="usuario" id="usuario">
        </div>
    </div>
    <div class="form-group mt-3" >
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">🔐</span>
            </div>
            <label for="password"></label>
            <input  type="password" class="form-control" placeholder="Contraseña"  name="password" id="password">
        </div>
    </div>

    <div class="col-12 mt-3" id="boton-registrarse">
        <button class="btn btn-primary" type="submit" name="iniciarSesion">Iniciar sesión</button>
        <button class="btn btn-primary" id="crearCuenta" name="crearCuenta" type="submit">Crear cuenta</button>
    </div>
</form>
<?php
session_start();
require_once ('./php/Conexion.php');
if (isset($_POST['crearCuenta'])) header('Location: ./registro.php');
if (isset($_POST['iniciarSesion'])){

    function comprobarDatos():bool{
        $conexion = new Conexion();
        $nombre=$_POST['usuario'];
        $password=$_POST['password'];
        $resultado=null;
            $prueba = mysqli_query($conexion->conn,"call comprobarDatos('$password','$nombre')");
            $dato=mysqli_fetch_row($prueba);
            if (empty($dato[0])==true){
                $resultado = false;
            }else{
                $resultado=true;
        }
        return $resultado;
    }

    if (comprobarDatos()==true){
        $_SESSION['usuario']=$_POST['usuario'];
        $_SESSION['password']=$_POST['password'];
        $nombre=$_SESSION['usuario'];
        $conexion= new Conexion();
        $dato=mysqli_query($conexion->conn,"call obtenerID('$nombre')");
        $nombre=mysqli_fetch_row($dato);
        $_SESSION['id']=$nombre[0];
        header('Location: ./principal.php');
    }else{
        echo "<script>
        alert('Error, usuario o contraseña incorrectos. Si no tienes un cuenta debes crearla primero.');
        window.location.href = 'index.php';
    </script>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>