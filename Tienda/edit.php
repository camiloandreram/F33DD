<?php

include_once("config.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

        $Nombre = $_POST['Nombre'];
		$Nit = $_POST['Nit'];
		$Direccion = $_POST['Direccion'];
		$Numero = $_POST['Numero'];
		$Email = $_POST['Email'];
		$Cod_postal = $_POST['Cod_postal'];
		$Ciudad = $_POST['Ciudad'];
		$localidad = $_POST['localidad'];
		$Cod_barrio = $_POST['Cod_barrio'];
		$Cod_Ciudad = $_POST['Cod_Ciudad'];
		$Tip_contrato = $_POST['Tip_contrato'];
		$Cod_localidad = $_POST['Cod_localidad'];

	if(empty($Nombre) || empty($Nit) || empty($Direccion) || empty($Numero) || empty($Email)  || empty($Cod_postal) || empty($Ciudad) || empty($localidad) || empty($Cod_barrio) || empty($Cod_Ciudad) || empty($Tip_contrato) || empty($Cod_localidad)) {

		if(empty($Nombre)) {
			echo "<font color='red'>Nombre está vacio.</font><br/>";
		}

		if(empty($Nit)) {
			echo "<font color='red'>Nit está vacio.</font><br/>";
		}

		if(empty($Direccion)) {
			echo "<font color='red'>Direccion está vacio.</font><br/>";
		}
		if(empty($Numero)) {
			echo "<font color='red'>Numero está vacio.</font><br/>";
		}
		if(empty($Email)) {
			echo "<font color='red'>Email está vacio.</font><br/>";
		}
		if(empty($Cod_postal)) {
			echo "<font color='red'>Cod_postal está vacio.</font><br/>";
		}
		if(empty($Ciudad)) {
			echo "<font color='red'>Ciudad está vacio.</font><br/>";
		}
		if(empty($localidad)) {
			echo "<font color='red'>localidad está vacio.</font><br/>";
		}
		if(empty($Cod_barrio)) {
			echo "<font color='red'>Cod_barrio está vacio.</font><br/>";
		}
		if(empty($Cod_Ciudad)) {
			echo "<font color='red'>Cod_Ciudad está vacio.</font><br/>";
		}
		if(empty($Tip_contrato)) {
			echo "<font color='red'>Tip_contrato está vacio.</font><br/>";
		}
		if(empty($Cod_localidad)) {
			echo "<font color='red'>Cod_localidad está vacio.</font><br/>";
		}
	} else {

		$sql = "UPDATE tienda_f33d SET Nombre=:Nombre, Nit=:Nit, Direccion=:Direccion, Numero=:Numero, Email=:Email, Cod_postal=:Cod_postal, Ciudad=:Ciudad, localidad=:localidad, Cod_barrio=:Cod_barrio, Cod_Ciudad=:Cod_Ciudad, Tip_contrato=:Tip_contrato, Cod_localidad=:Cod_localidad WHERE id=:id";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Nit', $Nit);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Email', $Email);
		$query->bindparam(':Cod_postal', $Cod_postal);
		$query->bindparam(':Ciudad', $Ciudad);
		$query->bindparam(':localidad', $localidad);
		$query->bindparam(':Cod_barrio', $Cod_barrio);
		$query->bindparam(':Cod_Ciudad', $Cod_Ciudad);
		$query->bindparam(':Tip_contrato', $Tip_contrato);
		$query->bindparam(':Cod_localidad', $Cod_localidad);

		$query->execute();


		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM tienda_f33d WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $Nombre = $row['Nombre'];
	$Nit = $row['Nit'];
	$Direccion = $row['Direccion'];
	$Numero = $row['Numero'];
	$Email = $row['Email'];
	$Cod_postal = $row['Cod_postal'];
	$Ciudad = $row['Ciudad'];
	$localidad = $row['localidad'];
	$Cod_barrio = $row['Cod_barrio'];
	$Cod_Ciudad = $row['Cod_Ciudad'];
	$Tip_contrato = $row['Tip_contrato'];
	$Cod_localidad = $row['Cod_localidad'];
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
				<td>Nombre</td>
				<td><input type="text" name="Nombre" value="<?php echo $Nombre;?>"></td>
			</tr>
			<tr>
				<td>Nit</td>
				<td><input type="text" name="Nit" value="<?php echo $Nit;?>"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="Varchar" name="Direccion" value="<?php echo $Direccion;?>"></td>
			</tr>
			<tr>
				<td>Numero</td>
				<td><input type="Int" name="Numero" value="<?php echo $Numero;?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="Email" name="Email" value="<?php echo $Email;?>"></td>
			</tr>
			<tr>
				<td>Cod_postal</td>
				<td><input type="int" name="Cod_postal" value="<?php echo $Cod_postal;?>"></td>
			</tr>
			<tr>
				<td>Ciudad</td>
				<td><input type="int" name="Ciudad" value="<?php echo $Ciudad;?>"></td>
			</tr>
			<tr>
				<td>localidad</td>
				<td><input type="int" name="localidad" value="<?php echo $localidad;?>"></td>
			</tr>
			<tr>
				<td>Cod_barrio</td>
				<td><input type="int" name="Cod_barrio" value="<?php echo $Cod_barrio;?>"></td>
			</tr>
			<tr>
				<td>Cod_Ciudad</td>
				<td><input type="int" name="Cod_Ciudad" value="<?php echo $Cod_Ciudad;?>"></td>
			</tr>
			<tr>
				<td>Tip_contrato</td>
				<td><input type="int" name="Tip_contrato" value="<?php echo $Tip_contrato;?>"></td>
			</tr>
			<tr>
				<td>Cod_localidad</td>
				<td><input type="int" name="Cod_localidad" value="<?php echo $Cod_localidad;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
