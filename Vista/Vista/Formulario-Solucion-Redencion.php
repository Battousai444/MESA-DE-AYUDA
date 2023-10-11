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
    <title>Formulario Solucion</title>
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
            <h2>Requerimientos</h2>
            <p class="lead">Todos los requerimientos.</p>
        </div>
        <?php
        include('../Modelo/Requerimiento.php');
        include_once '../Controlador/Conexion.php';
        $con = ConectarBD();
        $query = "SELECT * FROM detallereq";
        $sql = mysqli_query($con, $query);

        ?>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Observacion</th>
                        <th>Empleado Asignado</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = $data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?php echo $row['IDDETALLE'] ?></td>
                            <td><?php echo $row['FECHA'] ?></td>
                            <td><?php echo $row['OBSERVACION'] ?></td>
                            <td><?php 
                                $dataEmple = buscarEmpleadoId($row['FKEMPLEASIGNADO']);
                                echo($dataEmple['NOMBRE']);
                            ?></td>
                            <td><?php 
                                $dataEstado = buscarEstadoId($row['FKESTADO']);
                                echo($dataEstado['NOMBRE']); ?></td>
                            <td><a href="Formulario-Editar-Solucion.php?id=<?php echo $row['IDDETALLE'] ?>">
                                    <i class="fas fa-marker"></i>
                                </a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
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
<?php
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $fecha = $fechaActual = date('Y-m-d H:i:s');
    $estado = $_POST['estado'];
    $empleado = $_POST['empleado'];
    if (actualizarRequerimiento($id, $fecha, $estado, $empleado)) {
?>
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <?php
                    echo 'Requerimiento actualizado con exito';
                    ?>
                </h2>
            </div>
        </div>
<?php
    }
}
?>
</html>