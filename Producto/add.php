<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {
	$Codigo_producto = $_POST['Codigo_producto'];
	$Nombre = $_POST['Nombre'];
	$Direccion = $_POST['Direccion'];
	$Codigo_proveedor = $_POST['Codigo_proveedor'];
	$Codigo_existente = $_POST['Codigo_existente'];
	$Numero = $_POST['Numero'];
	$Precio_Unitario = $_POST['Precio_Unitario'];
	$Precio_Mayoritario = $_POST['Precio_Mayoritario'];

	if(empty($Codigo_producto) || empty($Nombre) || empty($Direccion) || empty($Codigo_proveedor) || empty($Codigo_existente) || empty($Numero) || empty($Precio_Unitario) || empty($Precio_Mayoritario)){

		if(empty($Codigo_producto)) {
			echo "<font color='red'>Campo: Codigo_producto esta vacio.</font><br/>";
		}

		if(empty($Nombre)) {
			echo "<font color='red'>Campo: Nombre esta vacio.</font><br/>";
		}

		if(empty($DIreccion)) {
			echo "<font color='red'>Campo: Direccion esta vacio.</font><br/>";
		}
		if(empty($Codigo_proveedor)) {
			echo "<font color='red'>Campo: Codigo_proveedor esta vacio.</font><br/>";
		}

		if(empty($Codigo_existente)) {
			echo "<font color='red'>Campo: Codigo_existente esta vacio.</font><br/>";
		}

		if(empty($Numero)) {
			echo "<font color='red'>Campo: Numero esta vacio.</font><br/>";
		}
		if(empty($Precio_Unitario)) {
			echo "<font color='red'>Campo: Precio_Unitario esta vacio.</font><br/>";
		}
		if(empty($Precio_Mayoritario)) {
			echo "<font color='red'>Campo: Precio_Mayoritario esta vacio.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		$sql = "INSERT INTO Producto_F33d (Codigo_producto, Nombre, Direccion, Codigo_proveedor, Codigo_existente, Numero, Precio_Unitario, Precio_Mayoritario) VALUES(:Codigo_producto, :Nombre, :Direccion, :Codigo_proveedor, :Codigo_existente, :Numero, :Precio_Unitario, :Precio_Mayoritario)";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':Codigo_producto', $Codigo_producto);
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Codigo_proveedor', $Codigo_proveedor);
		$query->bindparam(':Codigo_existente', $Codigo_existente);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Precio_Unitario', $Precio_Unitario);
		$query->bindparam(':Precio_Mayoritario', $Precio_Mayoritario);
		$query->execute();



		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>