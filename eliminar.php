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
echo "<h1>Eliminar Datos</h1>";
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
<form action="eliminar.php" method="post" >
    <h4 id="titulo">¿Estas seguro que deseas eliminar tu cuenta?</h4>
    <div class="input-group mb-3" id="eliminarSinPrivs">
        <span class="input-group-text" id="basic-addon1">🔑</span>
        <input class="form-control" name="idActual" type="text" value="<?php echo $_SESSION['id']; ?>" aria-label="readonly input example" readonly>
        <button class="btn btn-outline-danger" type="submit" id="button-addon2" name="Eliminar">Eliminar</button>
    </div>
    <h4 id="titulo2">Introduce el id de la persona que deseas eliminar</h4>
    <div class="input-group mb-3" id="eliminarConPrivs">
        <span class="input-group-text" id="basic-addon1">🔑</span>
        <input type="number" name="idOpcional" class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
        <button class="btn btn-outline-danger" type="submit" id="button-addon256" name="Eliminar2" disabled>Eliminar</button>
    </div>
</form>
<?php
require_once ('./php/Conexion.php');
$conexion = new Conexion();


if (isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}
if ($_SESSION['usuario']=='admin'){
    echo "<script>
    document.getElementById('button-addon256').disabled=false;
    </script>";
    echo "<script>
    document.getElementById('button-addon2').disabled=true;
    </script>";
    echo"<script>
     document.getElementById('titulo').style.display='none'
    </script>";
    echo"<script>
     document.getElementById('eliminarSinPrivs').style.display='none'
    </script>";

    if (isset($_POST['Eliminar2'])){
        $id2=$_POST['idOpcional'];
        if ($id2==1){
            echo "<script>
        alert('No puedes eliminar el usuario admin');
        window.location.href='eliminar.php';
        </script>";
        }else {
            mysqli_query($conexion->conn, "call eliminar('$id2')");
            echo "<script>
        alert('Has eliminado un usuario');
        window.location.href = 'mostrar.php';
        </script>";
        }
    }
}else{
    echo"<script>
     document.getElementById('titulo2').style.display='none'
    </script>";
    echo"<script>
     document.getElementById('eliminarConPrivs').style.display='none'
    </script>";
    if (isset($_POST['Eliminar'])){
        $id=$_POST['idActual'];
        mysqli_query($conexion->conn, "call eliminar('$id')");
        echo "<script>
        alert('Gracias por por usar nuestros servicios, HASTA PRONTO!');
        window.location.href = 'index.php';
    </script>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
