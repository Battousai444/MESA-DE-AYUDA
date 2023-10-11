<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Index</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container py-3">
        <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="Pagina-Principal.php" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Mesa De Ayuda</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <?php
                    session_start();
                    $usuario = $_SESSION['username'];
                ?>
                <a class="me-3 py-2 text-dark text-decoration-none" ><?php echo $usuario?></a>  
                <a class="me-3 py-2 text-dark text-decoration-none" href="Formulario-Requerimiento.php">Hacer Requerimiento</a>
                <a class="me-3 py-2 text-dark text-decoration-none" class="cerrar" id="cerrar" href="Logout.php">Cerrar Sesion</a>
            </nav>
        </header>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Formulario</h1>
            <p class="fs-5 text-muted">Haz los distintos procedimientos de la empresa.</p>
        </div>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Formulario Requerimiento</h4>
                        </div>
                        <div class="card-body">
                            <a href="Formulario-Requerimiento.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <?php
                if($_SESSION['admin'] == 1){
                    echo '<div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Formulario Area</h4>
                        </div>
                        <div class="card-body">
                            <a href="Formulario-Area.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Formulario Empleado</h4>
                        </div>
                        <div class="card-body">
                            <a href="Formulario-Empleado.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Formulario Cargo</h4>
                        </div>
                        <div class="card-body">
                            <a href="Formulario-Cargo.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Informes</h4>
                        </div>
                        <div class="card-body">
                            <a href="Informes.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>';
                }else{
                    echo '<div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Formulario Solucion</h4>
                        </div>
                        <div class="card-body">
                            <a href="Formulario-Solucion-Redencion.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Informes</h4>
                        </div>
                        <div class="card-body">
                            <a href="Informes.php" type="button" class="w-100 btn btn-lg btn-outline-primary">Ingresar</a>
                        </div>
                    </div>
                 </div>';
                }
                ?>
            </div>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
                    <small class="d-block mb-3 text-muted">&copy; 2021–2050</small>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>