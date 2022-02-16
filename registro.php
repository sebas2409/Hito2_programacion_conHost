<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c49ed490f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registro</title>
</head>
<body>
<h1 class="text-center mt-5">Introduce tus datos para registrarte</h1>
<form action="registro.php" method="post" id="formulario">
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
            <label for="email"></label>
            <input type="email" class="form-control" placeholder="Email"  name="email" id="email" required>
            <div class="input-group-append">
                <span class="input-group-text">📬</span>
            </div>
        </div>
    </div>
    <div class="form-group mt-3" >
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">🔐</span>
            </div>
            <label for="password"></label>
            <input  type="password" class="form-control" placeholder="Contraseña"  name="password" id="password" required>
        </div>
    </div>
    <div class="form-group mt-3" >
        <div class="input-group">
            <label for="password2"></label>
            <input type="password" class="form-control" placeholder="Repetir contraseña"  name="password2" id="password2" required>
            <div class="input-group-append">
                <span class="input-group-text">🔐</span>
            </div>
        </div>
    </div>
    <div class="form-group mt-3" >
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">🔗</span>
            </div>
            <label for="link"></label>
            <input type="url" class="form-control" placeholder="Ingrese el link"  name="link" id="link" required>
        </div>
    </div>
    <div class="col-12 mt-3" id="boton-registrarse">
        <button class="btn btn-primary" type="submit" name="registrarse">Registrarse</button>
    </div>
</form>
<?php

require_once('./php/Conexion.php');
$conexion = new Conexion();


if (isset($_POST['registrarse'])) {
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];
    $nombre = $_POST['usuario'];
    $email = $_POST['email'];
    $link = $_POST['link'];
    if ($password1 == $password2) {
        mysqli_query($conexion->conn, "call insertar('$nombre','$email','$password1','$link')");
        header('Location: ./index.php');
    } else {
        echo "<script>
        alert('Las contraseñas son distintas');
        window.location.href = 'registro.php';
    </script>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

