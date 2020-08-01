<?php

include_once("config.php");


$result = $dbConn->query("SELECT * FROM tienda_f33d ORDER BY id DESC");
?>

<html>
<head>
	<title>Crear Tienda</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/producto.css">
</head>

<body>
<a href="add.html">Adicionar Empleado</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Nit</td>
		<td>Direccion</td>
		<td>Numero</td>
		<td>Email</td>
		<td>Cod_postal</td>
		<td>Ciudad</td>
		<td>localidad</td>
		<td>Cod_barrio</td>
		<td>Cod_Ciudad</td>
		<td>Tip_contrato</td>
		<td>Opciones</td>
	</tr>
	<?php
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>".$row['Nombre']."</td>";
		echo "<td>".$row['Nit']."</td>";
		echo "<td>".$row['Direccion']."</td>";
		echo "<td>".$row['Numero']."</td>";
		echo "<td>".$row['Email']."</td>";

		echo "<td>".$row['Cod_postal']."</td>";
		echo "<td>".$row['Ciudad']."</td>";
		echo "<td>".$row['localidad']."</td>";
		echo "<td>".$row['Cod_barrio']."</td>";
		echo "<td>".$row['Cod_Ciudad']."</td>";
		echo "<td>".$row['Cod_localidad']."</td>";

		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>

</body>
</html>

