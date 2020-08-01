<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
	<head><title>Dashboard</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/inicio.css">
<body>
	<div style="margin: 15px">
		<div align="center">
			<?php
					if(isset($errMsg)){
						echo '<div style="color:#5B180A;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
				?>

				<div style=" padding:10px;"><b><?php echo $_SESSION['name']; ?></b></div>

					Bienvenido <?php echo $_SESSION['name']; ?> <br>

					<a href="Tienda/add.html">Tienda</a><br>
					<a href="Producto/add.html">Producto</a><br>
					<a href="update.php">Actualizar</a>
					<a href="logout.php">Salir</a>

			</div>

	</div>
</body>
</html>
