<?php
error_reporting(0);

if (!file_exists("./config.php")) {
    header("location: ./instalador");
}
require_once './database.php';
$pdo = Database::StartUp();
$stmt = $pdo->prepare("SELECT * FROM usuario limit 1");
$stmt->execute();
$usr = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>INSTALADOR | PHP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}


table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #000;
  color: white;
}
</style>
</head>
<body  >
	<center>
         <h1>Datos Administrador</h1>
         <table>
         	<tr>
			<th>Id</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Correo</th>
		</tr>
        	<tr>
			<td> <?php echo $usr[0]->id_usuario; ?></td>
			<td> <?php echo $usr[0]->cedula; ?></td>
 			<td> <?php echo $usr[0]->nombre.' '.$usr[0]->apellidos; ?></td>
			<td> <?php echo $usr[0]->email; ?></td>
       		</tr>
        </table>
        <table>
         	<tr>
			<th>Contraseña</th>
			<th>Dirección</th>
			<th>Rol</th>
			<th>N° Telefono</th>
		</tr>
        	<tr>
			<td> <?php echo $usr[0]->contrasena; ?></td>
			<td> <?php echo $usr[0]->direccion; ?></td>
			<td> <?php echo $usr[0]->rol; ?></td>
			<td> <?php echo $usr[0]->telefono; ?></td>
       		</tr>
        </table>
	</center>

</body>

</html>