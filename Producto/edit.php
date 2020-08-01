<?php

include_once("config.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

        $Codigo_producto = $_POST['Codigo_producto'];
		$Nombre = $_POST['Nombre'];
		$Direccion = $_POST['Direccion'];
		$Codigo_proveedor = $_POST['Codigo_proveedor'];
		$Codigo_existente = $_POST['Codigo_existente'];
		$Numero = $_POST['Numero'];
		$Precio_Unitario = $_POST['Precio_Unitario'];
		$Precio_Mayoritario = $_POST['Precio_Mayoritario'];

	if(empty($Codigo_producto) || empty($Nombre) || empty($Direccion) || empty($Codigo_proveedor) || empty($Codigo_existente) || empty($Numero) || empty($Precio_Unitario) || empty($Precio_Mayoritario)) {

		if(empty($Codigo_producto)) {
			echo "<font color='red'>Codigo_producto está vacio.</font><br/>";
		}

		if(empty($Nombre)) {
			echo "<font color='red'>Nombre está vacio.</font><br/>";
		}

		if(empty($Direccion)) {
			echo "<font color='red'>Direccion está vacio.</font><br/>";
		}
		if(empty($Codigo_proveedor)) {
			echo "<font color='red'>Codigo_proveedor está vacio.</font><br/>";
		}
		if(empty($Codigo_existente)) {
			echo "<font color='red'>Codigo_existente está vacio.</font><br/>";
		}
		if(empty($Numero)) {
			echo "<font color='red'>Numero está vacio.</font><br/>";
		}
		if(empty($Precio_Unitario)) {
			echo "<font color='red'>Precio_Unitario está vacio.</font><br/>";
		}
		if(empty($Precio_Mayoritario)) {
			echo "<font color='red'>Precio_Mayoritario está vacio.</font><br/>";
		}
	} else {

		$sql = "UPDATE Producto_F33d SET Codigo_producto=:Codigo_producto, Nombre=:Nombre, Direccion=:Direccion, Codigo_proveedor=:Codigo_proveedor, Codigo_existente=:Codigo_existente, Numero=:Numero, Precio_Unitario=:Precio_Unitario, Precio_Mayoritario=:Precio_Mayoritario WHERE id=:id";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':Codigo_producto', $Codigo_producto);
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Codigo_proveedor', $Codigo_proveedor);
		$query->bindparam(':Codigo_existente', $Codigo_existente);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Precio_Unitario', $Precio_Unitario);
		$query->bindparam(':Precio_Mayoritario', $Precio_Mayoritario);

		$query->execute();


		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM Producto_F33d WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $Codigo_producto = $row['Codigo_producto'];
	$Nombre = $row['Nombre'];
	$Direccion = $row['Direccion'];
	$Codigo_proveedor = $row['Codigo_proveedor'];
	$Codigo_existente = $row['Codigo_existente'];
	$Numero = $row['Numero'];
	$Precio_Unitario = $row['Precio_Unitario'];
	$Precio_Mayoritario = $row['Precio_Mayoritario'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Codigo_producto</td>
				<td><input type="text" name="Codigo_producto" value="<?php echo $Codigo_producto;?>"></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="Nombre" value="<?php echo $Nombre;?>"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="Varchar" name="Direccion" value="<?php echo $Direccion;?>"></td>
			</tr>
			<tr>
				<td>Codigo_proveedor</td>
				<td><input type="text" name="Codigo_proveedor" value="<?php echo $Codigo_proveedor;?>"></td>
			</tr>
			<tr>
				<td>Codigo_existente</td>
				<td><input type="Int" name="Codigo_existente" value="<?php echo $Codigo_existente;?>"></td>
			</tr>
			<tr>
				<td>Numero</td>
				<td><input type="int" name="Numero" value="<?php echo $Numero;?>"></td>
			</tr>
			<tr>
				<td>Precio_Unitario</td>
				<td><input type="int" name="Precio_Unitario" value="<?php echo $Precio_Unitario;?>"></td>
			</tr>
			<tr>
				<td>Precio_Mayoritario</td>
				<td><input type="int" name="Precio_Mayoritario" value="<?php echo $Precio_Mayoritario;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
