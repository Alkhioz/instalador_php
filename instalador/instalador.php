
<!DOCTYPE html>
<html lang="es">
<head>
	<title>INSTALADOR | PHP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<style> 
input {
  width: 300px;
  padding: 5px 5px 5px 10px;
  margin-bottom: 5px;
}
</style>
</head>
<body  >
	<center>

		
    		<form  action='' method='post'>
            	<label>Datos de la base</label><br> 
            	<input required type="text" name="host" placeholder="Host de la Base de Datos"><br>
		<input required type="text" name="dbnombre" placeholder="Nombre de la base de datos"><br>
		<input required type="text" name="dbunombre" placeholder="Nombre del usuario de la base de datos"><br>
		<input type="password" name="dbcontrasena" placeholder="Contraseña de usuario de base"><br>
				
		<label>Datos de la cuenta de administrador</label><br>
		<input required type="text" name="cedula" placeholder="ID administrador"><br>
		<input required type="text" name="correo" placeholder="Correo electrónico del administrador"><br>
		<input required type="text" name="nombre" placeholder="Nombre del administrador"><br>
		<input required type="text" name="apellido" placeholder="Apellido del administrador"><br>
		<input required type="text" name="direccion" placeholder="Domicilio del administrador"><br>
		<input required type="text" name="telefono" placeholder="Número de teléfono del administrador"><br>
		<input required type="password" name="contrasena" placeholder="Contraseña de administrador"><br>
                <input type="submit" name="submit" value="Guardar"><br>
		</form>
	</center>

</body>

</html>
