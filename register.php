<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$secretpin = $_POST['secretpin'];

		if($fullname == '')
			$errMsg = 'Ingrese su Nombre Completo';
		if($username == '')
			$errMsg = 'Ingrese su Usuario';
		if($password == '')
			$errMsg = 'Ingrese su Contraseña';
		if($secretpin == '')
			$errMsg = 'Ingrese su recordatorio';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO users (fullname, username, password, secretpin) VALUES (:fullname, :username, :password, :secretpin)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':username' => $username,
					':password' => $password,
					':secretpin' => $secretpin
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registro Exitoso!!. Ahora puede Ingresar <a href="login.php">Ingreso</a>';
	}
?>

<html>
<head><title>Registro</title></head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="assets/css/registro.css">
</style>
<body background="https://image.freepik.com/foto-gratis/diversa-comida-mexicana-fondo-oscuro_23-2147740705.jpg">
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-12">
	  <div class="card">
		<div class="loginBox">
			<div align="center">
				<h1>Registrate</h1>
				<div style="margin: 15px">
					<form action="" method="post">
						<input type="text" name="fullname" placeholder="Nombre Completo" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />
						<input type="text" name="username" placeholder="Ususario" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
						<input type="password" name="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
						<input type="text" name="secretpin" placeholder="Pin secreto (numeros)" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box"/><br /><br />
						<input type="submit" name='register' value="Registro" class='submit'/><br />
					</form>
					<span><a href="index.php">Volver al inicio</a></span>
				</div>
			<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
			?>
			</div>
		</div>
	  </div>
	</div>
   </div>
  </div>
</div>

</body>
</html>
