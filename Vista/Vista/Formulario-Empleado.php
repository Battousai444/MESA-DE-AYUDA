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
        <div class="py-5 text-center">
            <img class="" alt="" width="72" height="57">
            <h2>Formulario Empleados</h2>
            <p class="lead">Edicion Empleados.</p>
        </div>
        <form action="Formulario-Empleado.php" method="POST">
            <div class="row g-3">
                <label for="id" class="form-label">Id Empleado: </label>
                <input type="number" class="form-control" id="id" name="id" placeholder="" value="">
                <label for="nombre" class="form-label">Nombre Completo: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="">
                <label for="" class="form-label">Foto: </label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="" value="">
                <label for="" class="form-label">Hoja de vida: </label>
                <input type="file" class="form-control" id="hojavida" name="hojavida" placeholder="" value="">
                <label for="" class="form-label">Telefono: </label>
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="" value="">
                <label for="" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="">
                <label for="" class="form-label">Direccion: </label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="">
                <label for="" class="form-label">X: </label>
                <input type="text" class="form-control" id="x" name="x" placeholder="" value="">
                <label for="" class="form-label">Y: </label>
                <input type="text" class="form-control" id="y" name="y" placeholder="" value="">
                <label for="" class="form-label">Id Jefe: </label>
                <input type="number" class="form-control" id="jefe" name="jefe" placeholder="" value="">
                <label for="" class="form-label">Id Area: </label>
                <input type="number" class="form-control" id="area" name="area" placeholder="" value="">

                <button class="w-100 btn btn-primary btn-lg" type="submit" name="registrar">Registrar</button>
                <button class="w-100 btn btn-primary btn-lg" type="submit" name="buscar">Buscar</button>
                <button class="w-100 btn btn-primary btn-lg" type="submit" name="eliminar">Eliminar</button>
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
include('../Modelo/Empleado.php');
if (isset($_POST['registrar'])) {
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
    if (registrarEmpleado($id, $nombre, $foto, $hojavida, $telefono, $email, $direccion, $x, $y, $jefe, $area)) {
?>
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <?php
                    echo 'Empleado registrado con exito';
                    ?>
                </h2>
            </div>
        </div>
    <?php
    }
}
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    if (eliminarEmpleado($id)) {
    ?>
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <?php
                    echo 'Empleado eliminado con exito';
                    ?>
                </h2>
            </div>
        </div>
    <?php
    }
}
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
if (isset($_POST['buscar'])) {
    $idEmpleado = $_POST['id'];
    $buscar = buscarEmpleado($idEmpleado);
    $row = $buscar;
    ?>
        <br><br>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Empleado</th>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>Hoja de vida</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>X</th>
                        <th>Y</th>
                        <th>Id Empleado Jefe</th>
                        <th>Id Area</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for ($i=0; $i < 1; $i++) {
                    ?>
                    <td><?php echo $row['IDEMPLEADO']?></td>
                    <td><?php echo $row['NOMBRE']?></td>
                    <td><?php echo $row['FOTO']?></td>
                    <td><?php echo $row['HOJAVIDA']?></td>
                    <td><?php echo $row['TELEFONO']?></td>
                    <td><?php echo $row['EMAIL']?></td>
                    <td><?php echo $row['DIRECCION']?></td>
                    <td><?php echo $row['X']?></td>
                    <td><?php echo $row['Y']?></td>
                    <td><?php echo $row['fkEMPLE_JEFE']?></td>
                    <td><?php echo $row['fkAREA']?></td>
                    <td><a href="Formulario-Editar-Empleado.php?id=<?php echo $row['IDEMPLEADO']?>">
                            <i class="fas fa-marker"></i>
                    </a></td>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
}

?>