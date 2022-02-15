<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c49ed490f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Principal</title>
    <style>
        *{
            padding: 5px;
        }
    </style>
</head>
<body>
<?php
session_start();
echo "<h1>Mostrar Datos</h1>";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="principal.php">Página Principal</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mostrar.php">Mostrar Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="editar.php">Editar Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eliminar.php">Eliminar Datos</a>
                </li>
            </ul>
            <form class="d-flex" method="post" action="principal.php">
                <button class="btn btn-outline-success" name="cerrarSesion" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</nav>
<!-- tabla -->
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Usuario</th>
        <th scope="col">email</th>
        <th scope="col">contraseña</th>
        <th scope="col">enlace</th>
    </tr>
    </thead>
    <tbody>
<?php
require_once ('./php/Conexion.php');
$conexion=new Conexion();
$nombre = $_SESSION['usuario'];
if (isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}
if ($_SESSION['usuario']=="admin"){
    $datos1=mysqli_query($conexion->conn,"call obtenerDatosAdmin()");
    while($fila = mysqli_fetch_array($datos1)){
        echo "
        <tr>
        <th scope='row'>".$fila[0]."</th>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>
        <td>".$fila[3]."</td>
        <td>".$fila[4]."</td>
        </tr>
        ";
    }
}else{
    $datos=mysqli_query($conexion->conn,"call obtenerDatos('$nombre')");
    while($fila = mysqli_fetch_array($datos)){
        echo "
        <tr>
        <th scope='row'>".$fila[0]."</th>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>
        <td>".$fila[3]."</td>
        <td>".$fila[4]."</td>
        </tr>
        ";
    }
}
?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
