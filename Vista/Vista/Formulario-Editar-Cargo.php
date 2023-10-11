<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Formulario Cargo</title>
</head>
<?php
include('../Modelo/Cargo.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $buscar = buscarCargo($id);
    $nombre = $buscar['NOMBRE'];
}
?>
<body class="bg-light">
    <div class="container">
        <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="Pagina-Principal.php" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Mesa De Ayuda</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="Formulario-Requerimiento.php">Hacer Requerimiento</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="Logout.php">Cerrar Sesion</a>
            </nav>
        </header>
        <div class="py-5 text-center">
            <img class="" alt="" width="72" height="57">
            <h2>Formulario Cargo</h2>
            <p class="lead">Ingresa el cargo para la mesa de ayuda.</p>
        </div>
        <form action="Formulario-Cargo.php" method="POST">
            <div class="row g-3">
                <label for="id" class="form-label">Id Cargo: </label>
                <input type="number" class="form-control" id="id" name="id" placeholder="" value="<?php echo $id ?>">
                <label for="nombre" class="form-label">Nombre Cargo: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo $nombre ?>">
                <button class="w-100 btn btn-primary btn-lg" type="submit" name="actualizar">Actualizar</button>
            </div>
        </form>
    </div>
</body>
<?php
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $idCargo = $_POST['id'];
    if (actualizarCargo($idCargo, $nombre)) {
    ?>
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <?php
                    echo 'Cargo actualizado con exito';
                    ?>
                </h2>
            </div>
        </div>
    <?php
    }
}
?>

<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
                <small class="d-block mb-3 text-muted">&copy; 2021–2050</small>
            </div>
    </footer>
</div>

</html>