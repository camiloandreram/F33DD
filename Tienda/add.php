<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {
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


	if(empty($Nombre) || empty($Nit) || empty($Direccion) || empty($Numero) || empty($Email) || empty($Cod_postal) || empty($Ciudad) || empty($localidad) || empty($Cod_barrio) || empty($Cod_Ciudad) || empty($Tip_contrato) || empty($Cod_localidad)) {

		if(empty($Nombre)) {
			echo "<font color='red'>Campo: Nombre esta vacio.</font><br/>";
		}

		if(empty($Nit)) {
			echo "<font color='red'>Campo: Nit esta vacio.</font><br/>";
		}

		if(empty($Direccion)) {
			echo "<font color='red'>Campo: Direccion esta vacio.</font><br/>";
		}

		if(empty($Numero)) {
			echo "<font color='red'>Campo: Numero esta vacio.</font><br/>";
		}

		if(empty($Email)) {
			echo "<font color='red'>Campo: Email esta vacio.</font><br/>";
		}
		if(empty($Cod_postal)) {
			echo "<font color='red'>Campo: Cod_postal esta vacio.</font><br/>";
		}
		if(empty($Ciudad)) {
			echo "<font color='red'>Campo: Ciudad esta vacio.</font><br/>";
		}
		if(empty($localidad)) {
			echo "<font color='red'>Campo: localidad esta vacio.</font><br/>";
		}
		if(empty($Cod_barrio)) {
			echo "<font color='red'>Campo: Cod_barrio esta vacio.</font><br/>";
		}
		if(empty($Cod_Ciudad)) {
			echo "<font color='red'>Campo: Cod_Ciudad esta vacio.</font><br/>";
		}
		if(empty($Tip_contrato)) {
			echo "<font color='red'>Campo: Tip_contrato esta vacio.</font><br/>";
		}
		if(empty($Cod_localidad)) {
			echo "<font color='red'>Campo: Cod_localidad esta vacio.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		$sql = "INSERT INTO tienda_f33d (Nombre, Nit, Direccion, Numero, Email, Cod_postal, Ciudad, localidad, Cod_barrio, Cod_Ciudad, Tip_contrato, Cod_localidad ) VALUES(:Nombre, :Nit, :Direccion, :Numero, :Email, :Cod_postal, :Ciudad, :localidad, :Cod_barrio, :Cod_Ciudad, :Tip_contrato, :Cod_localidad)";
		$query = $dbConn->prepare($sql);

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



		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>