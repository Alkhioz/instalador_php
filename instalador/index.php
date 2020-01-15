<?php 

error_reporting(0);

if(isset($_POST['submit'])){
$data='<?php
$HOST = "'.$_POST['host'].'"; 
$DATABASE = "'.$_POST['dbnombre'].'";
$USER = "'.$_POST['dbunombre'].'";
$PASS = "'.$_POST['dbcontrasena'].'";
?>';
			$fp=fopen('../config.php','w') or die("No tiene permiso para escribir en la carpeta model");
			fwrite($fp,$data);
			fclose($fp);

            $pdo = new PDO('mysql:host='.$_POST['host'].';dbname='.$_POST['dbnombre'].';charset=utf8', $_POST['dbunombre'], $_POST['dbcontrasena']);
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
$sql = "

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rol` ENUM('Estudiante', 'Docente', 'Evaluador', 'Administrador') NOT NULL DEFAULT 'Estudiante',
  `telefono` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'Default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `usuario`
  CHANGE id_usuario id_usuario INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `usuario`
  ADD UNIQUE (`email`);

ALTER TABLE `usuario`
  ADD UNIQUE (`cedula`);  

";

    try 
		{
			$pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}


        try 
		{
		
		$stmt = $pdo->prepare("INSERT INTO usuario (cedula,nombre,apellidos,email,contrasena,direccion,telefono,rol) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->execute(
				array( 
                    $_POST['cedula'],
        			$_POST['nombre'],
        			$_POST['apellido'],  
        			$_POST['correo'],
        			crypt ($_POST['contrasena'], substr ($_POST['nombre'], 0, 2)),
        			$_POST['direccion'],
        			$_POST['telefono'],
        			'Administrador'
                )
			);
		} catch (Exception $e) 
		{
			//die($e->getMessage());
		}
    


	   header('Location: ../');

		}


if (!file_exists("../config.php")) {
 	include("instalador.php");
 }else{
 	include("instalado.php");
 }



?>