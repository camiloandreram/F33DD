<?php

include_once("config.php");


$result = $dbConn->query("SELECT * FROM Producto_F33d ORDER BY id DESC");
?>

<html>
<head>
	<title>Crear Empleado</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/producto.css">
</head>

<body>
<a href="add.html">Adicionar Producto</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Codigo_producto</td>
		<td>Nombre</td>
		<td>Direccion</td>
		<td>Codigo_proveedor</td>
		<td>Codigo_existente</td>
		<td>Numero</td>
		<td>Precio_Unitario</td>
		<td>Precio_Mayoritario</td>
	</tr>
	<?php
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>".$row['Codigo_producto']."</td>";
		echo "<td>".$row['Nombre']."</td>";
		echo "<td>".$row['Direccion']."</td>";
		echo "<td>".$row['Codigo_proveedor']."</td>";
		echo "<td>".$row['Codigo_existente']."</td>";
		echo "<td>".$row['Numero']."</td>";
		echo "<td>".$row['Precio_Unitario']."</td>";
		echo "<td>".$row['Precio_Mayoritario']."</td>";
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>

</body>
</html>

