<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c49ed490f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
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
echo "<h1>Editar Datos</h1>";
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
<form action="editar.php" method="post">
    <!-- usuario normal-->
    <div class="input-group mb-3" id="cambiarSinPrivs1">
        <span class="input-group-text" id="basic-addon1">👤</span>
        <input class="form-control" name="idNombre" type="text" value="<?php echo $_SESSION['id']; ?>" aria-label="readonly input example" readonly>
        <input type="text" name="nombre" class="form-control" placeholder="Nuevo nombre de usuario" aria-label="Nombre de usuario" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarNombre">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="cambiarSinPrivs2">
        <span class="input-group-text" id="basic-addon1">🔐</span>
        <input class="form-control" name="idPass" type="text" value="<?php echo $_SESSION['id']; ?>" aria-label="readonly input example" readonly>
        <input type="text" name="password" class="form-control" placeholder="Nueva contraseña" aria-label="Contraseña" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarPassword">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="cambiarSinPrivs3">
        <span class="input-group-text" id="basic-addon1">📬</span>
        <input class="form-control" name="idCorreo" type="text" value="<?php echo $_SESSION['id']; ?>" aria-label="readonly input example" readonly>
        <input type="text" class="form-control" name="correo" placeholder="Nuevo correo electrónico" aria-label="Correo" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarCorreo">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="cambiarSinPrivs4">
        <span class="input-group-text" id="basic-addon1">🔗</span>
        <input class="form-control" name="idUrl" type="text" value="<?php echo $_SESSION['id']; ?>" aria-label="readonly input example" readonly>
        <input type="url" class="form-control" name="url" placeholder="Nuevo URL" aria-label="URL" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarUrl">Cambiar</button>
    </div>
    <!-- usuario admin -->
    <div class="input-group mb-3" id="eliminarConPrivs1">
        <span class="input-group-text" id="basic-addon1">👤</span>
        <input type="number" name="idOpcional1" class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
        <input type="text" name="nombreOpcional" class="form-control" placeholder="Nuevo nombre de usuario" aria-label="Nombre de usuario" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarNombreOpcional">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="eliminarConPrivs2">
        <span class="input-group-text" id="basic-addon1">🔐</span>
        <input type="number" name="idOpcional2" class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
        <input type="text" name="passwordOpcional" class="form-control" placeholder="Nuevo contraseña" aria-label="Nombre de usuario" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarPassword">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="eliminarConPrivs3">
        <span class="input-group-text" id="basic-addon1">📬</span>
        <input type="number" name="idOpcional3" class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
        <input type="text" name="correoOpcional" class="form-control" placeholder="Nuevo correo electrónico" aria-label="Nombre de usuario" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarCorreo">Cambiar</button>
    </div>
    <div class="input-group mb-3" id="eliminarConPrivs4">
        <span class="input-group-text" id="basic-addon1">🔗</span>
        <input type="number" name="idOpcional4" class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
        <input type="text" name="urlOpcional" class="form-control" placeholder="Nuevo URL" aria-label="Nombre de usuario" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning" type="submit" id="button-addon2" name="cambiarUrl">Cambiar</button>
    </div>
</form>

<?php
require_once ('./php/Conexion.php');
$conexion= new Conexion();
if (isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}
if ($_SESSION['usuario']!=='admin'){
    echo "<script>
    document.getElementById('eliminarConPrivs1').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('eliminarConPrivs2').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('eliminarConPrivs3').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('eliminarConPrivs4').style.display='none'
    </script>";
    if(isset($_POST['cambiarNombre'])){
        $nombreNuevo=$_POST['nombre'];
        $idActual=$_POST['idNombre'];
        mysqli_query($conexion->conn,"call cambiarNombre('$nombreNuevo','$idActual')");
        echo '<script>
    alert("Nombre de usuario cambiado")
    </script>';
        $_SESSION['usuario']=$nombreNuevo;
    }
    if(isset($_POST['cambiarPassword'])){
        $nombreNuevo=$_POST['password'];
        $idActual=$_POST['idPass'];
        mysqli_query($conexion->conn,"call cambiarpassword('$idActual','$nombreNuevo')");
        echo '<script>
    alert("Contraseña cambiada")
    </script>';
    }
    if(isset($_POST['cambiarCorreo'])){
        $nombreNuevo=$_POST['correo'];
        $idActual=$_POST['idCorreo'];
        mysqli_query($conexion->conn,"call cambiarCorreo('$idActual','$nombreNuevo')");
        echo '<script>
    alert("Correo cambiado")
    </script>';
    }
    if(isset($_POST['cambiarUrl'])){
        $nombreNuevo=$_POST['url'];
        $idActual=$_POST['idUrl'];
        mysqli_query($conexion->conn,"call cambiarURL('$idActual','$nombreNuevo')");
        echo '<script>
    alert("URL cambiado")
    </script>';
    }
}else {
    echo "<script>
    document.getElementById('cambiarSinPrivs1').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('cambiarSinPrivs2').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('cambiarSinPrivs3').style.display='none'
    </script>";
    echo "<script>
    document.getElementById('cambiarSinPrivs4').style.display='none'
    </script>";
    if (isset($_POST['cambiarNombreOpcional'])) {
        $nombreNuevo = $_POST['nombreOpcional'];
        $idActual = $_POST['idOpcional1'];
        mysqli_query($conexion->conn, "call cambiarNombre('$nombreNuevo','$idActual')");
        echo '<script>
    alert("Nombre de usuario cambiado")
    </script>';
    }
    if (isset($_POST['cambiarPassword'])) {
        $nombreNuevo = $_POST['passwordOpcional'];
        $idActual = $_POST['idOpcional2'];
        mysqli_query($conexion->conn, "call cambiarpassword('$idActual','$nombreNuevo')");
        echo '<script>
    alert("Contraseña cambiada")
    </script>';
    }
    if (isset($_POST['cambiarCorreo'])) {
        $nombreNuevo = $_POST['correoOpcional'];
        $idActual = $_POST['idOpcional3'];
        mysqli_query($conexion->conn, "call cambiarCorreo('$idActual','$nombreNuevo')");
        echo '<script>
    alert("Correo cambiado")
    </script>';
    }
    if (isset($_POST['cambiarUrl'])) {
        $nombreNuevo = $_POST['urlOpcional'];
        $idActual = $_POST['idOpcional4'];
        mysqli_query($conexion->conn, "call cambiarURL('$idActual','$nombreNuevo')");
        echo '<script>
    alert("URL cambiado")
    </script>';
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
