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
    <script src="https://kit.fontawesome.com/cf1eafdbfc.js" crossorigin="anonymous"></script>
    <title>Formulario Empleados</title>
</head>

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
        <?php
        include('../Modelo/Empleado.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $buscar = buscarEmpleado($id);
            $nombre = $buscar['NOMBRE'];
            $foto = $buscar['FOTO'];
            $hv = $buscar['HOJAVIDA'];
            $telefono = $buscar['TELEFONO'];
            $email = $buscar['EMAIL'];
            $direccion = $buscar['DIRECCION'];
            $x = $buscar['X'];
            $y = $buscar['Y'];
            $fkjefe = $buscar['fkEMPLE_JEFE'];
            $fkarea = $buscar['fkAREA'];    
        }
        ?>
        <div class="py-5 text-center">
            <img class="" alt="" width="72" height="57">
            <h2>Formulario Empleados</h2>
            <p class="lead">Edicion Empleados.</p>
        </div>
        <form action="Formulario-Empleado.php" method="POST">
            <div class="row g-3">
                <label for="id" class="form-label">Id Empleado: </label>
                <input type="number" class="form-control" id="id" name="id" placeholder="" value="<?php echo $id ?>">
                <label for="nombre" class="form-label">Nombre Completo: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo $nombre ?>">
                <label for="" class="form-label">Foto: </label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="" value="<?php echo $foto ?>">
                <label for="" class="form-label">Hoja de vida: </label>
                <input type="file" class="form-control" id="hojavida" name="hojavida" placeholder="" value="<?php echo $hv ?>">
                <label for="" class="form-label">Telefono: </label>
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="" value="<?php echo $telefono ?>">
                <label for="" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $email ?>">
                <label for="" class="form-label">Direccion: </label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="<?php echo $direccion ?>">
                <label for="" class="form-label">X: </label>
                <input type="text" class="form-control" id="x" name="x" placeholder="" value="<?php echo $x ?>">
                <label for="" class="form-label">Y: </label>
                <input type="text" class="form-control" id="y" name="y" placeholder="" value="<?php echo $y ?>">
                <label for="" class="form-label">Id Jefe: </label>
                <input type="number" class="form-control" id="jefe" name="jefe" placeholder="" value="<?php echo $fkjefe ?>">
                <label for="" class="form-label">Id Area: </label>
                <input type="number" class="form-control" id="area" name="area" placeholder="" value="<?php echo $fkarea ?>">

                <button class="w-100 btn btn-primary btn-lg" type="submit" name="actualizar">Actualizar</button>
            </div>
        </form>
    </div>
</body>
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

<?php
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $foto = $_POST['foto'];
    $hojavida = $_POST['hojavida'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $jefe = $_POST['jefe'];
    $area = $_POST['area'];
    if (actualizarEmpleado($id, $nombre, $foto, $hojavida, $telefono, $email, $direccion, $x, $y, $jefe, $area)) {
    ?>
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <?php
                    echo 'Empleado actualizado con exito';
                    ?>
                </h2>
            </div>
        </div>
    <?php
    }
}
?>