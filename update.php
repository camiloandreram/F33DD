<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';

		// Getting data from FROM
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];

		if($password != $passwordVarify)
			$errMsg = 'Error en la contraseña.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE users SET fullname = :fullname, password = :password, secretpin = :secretpin WHERE username = :username";
		      $stmt = $connect->prepare($sql);
		      $stmt->execute(array(
		        ':fullname' => $fullname,
		        ':secretpin' => $secretpin,
		        ':password' => $password,
		        ':username' => $_SESSION['username']
		      ));
				header('Location: update.php?action=updated');
				exit;

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'updated')
		$errMsg = 'Datos Actualizados Correctamente. <a href="logout.php">Salga</a> e ingrese de nuevo.';
?>

<html>
	<head><title>Actualizar</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

<body>
	<?php echo $_SESSION['name'] ?>
					<form action="" method="post">
						<h3>Nombre Completo</h3>
						<input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" autocomplete="off" class="box"/>
						<h3>Usuario</h3>
						<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off" class="box"/>
						<h3>Pin Secreto</h3>
						<input type="text" name="secretpin" value="<?php echo $_SESSION['secretpin']; ?>" autocomplete="off" class="box"/>
						<hr>
						<h3>Contraseña</h3>
						<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" />
						<h3>Validar Contraseña</h3>
						<input type="password" name="passwordVarify" value="<?php echo $_SESSION['password'] ?>" class="box" />
						<input type="submit" name='update' value="Actualizar" class='submit'/><br />
						<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
						?>
					</form>

</body>
</html>
