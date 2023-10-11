<html>
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="Estilo/util.css">
	<link rel="stylesheet" type="text/css" href="Estilo/principal.css">
</head>
<body>
	<div class="limiter">
		<div class="container-loginteam">
			<div class="wrap-loginteam">
				<div class="loginteam-pic js-tilt" data-tilt>
					<img src="images/logo.jpg" alt="IMG">
					
					
				</div>

				<form class="loginteam-form validate-form" action="login.php" method="POST">
					<span class="loginteam-form-title">
						Mesa de Ayuda
					</span>
					<span class="loginteam-form-title">
						Iniciar sesión
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-loginteam-form-btn">
						<button class="loginteam-form-btn"  name="Login" type="submit">
							Ingresar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    <?php
    if (isset($_POST['Login'])) {
        include_once '../Controlador/Conexion.php';
        session_start();

        $usuario = $_POST['usuario'];
        $contra = $_POST['pass'];

        $con = ConectarBD();

        $q = "SELECT COUNT(*) as contar FROM usuarios WHERE usuario = '$usuario' and pass = '$contra'";
		$q2 = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$contra'";
        
		$consulta = mysqli_query($con, $q);
		$consulta2 = mysqli_query($con, $q2);

        $array = mysqli_fetch_array($consulta);
		$array2 = mysqli_fetch_assoc($consulta2);
		
		//$q3 = "SELECT * FROM empleado WHERE IDEMPLEADO = '".$_SESSION['fkEmpleado']."'";
		//$consulta3 = mysqli_query($con, $q3);
		//$array3 = mysqli_fetch_assoc($consulta3);

        if($array['contar'] > 0){
			if($array2["roles"] == 1){
				$_SESSION['admin'] = 1;
			}else if ($array2["roles"] == 0){
				$_SESSION['admin'] = 0;
			}else{
				$_SESSION['admin'] = 2;
			}
            $_SESSION['username'] = $usuario;
			$_SESSION['fkEmpleado'] = $array2["fkEmpleado"];
            header("location: ./Pagina-Principal.php");
        }else{
            echo "DATOS INCORRECTOS";
        }
    }
    ?>
</body>
</html>