<?php
session_start();

if($_POST['submit']) {
	include_once('connection.php');
	$username = strip_tags($_POST['usuario']);
	$password = strip_tags($_POST['clave']);

	$sql = "SELECT idusuario,usuario,clave,nombre,apaterno,amaterno FROM usuarios where usuario = '$username' limit 1";
	$query = mysqli_query($db, $sql);
	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[0];
		$dbUserName = $row[1];
		$dbPassword = $row[2];
		$dbname     = $row[3];
		$dbpater    = $row[4];
		$dbmater    = $row[5];
	}
	if($username == $dbUserName && $password == $dbPassword) {

	    $_SESSION['idusuario'] = $userId;
		$_SESSION['usuario'] = $username;
		
		
		$_SESSION['nombre']   = $dbname;
		$_SESSION['apaterno'] = $dbpater;
		$_SESSION['amaterno'] = $dbmater;
		//echo "<b><i>usuario y clave correctos</i><b>";
		header('Location: user.php');
	}
	else {
		echo "<b><i>usuario y clave incorrectos index.php</i><b>";

	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN SISTEMA DE GESTION DE LA INFORMACION PETRAMAS</title>
	<script src="validaformulario.js"></script>
	<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="necesario_pa_Iexplorer">
<table border="0" class="centrada" width="50%">
	<tbody>
		<tr>
			<td>
			<div class="row no-margin no-padding" id="video-container">
			<video autoplay="" loop="" muted=""><source src="videopetramas.mp4" /></video>
			</div>
			</td>
		</tr>
		<tr>
			<td class="centrada">
			<h3>SISTEMA DE GESTION DE LA INFORMACION PETRAMAS</h3>
			</td>
		</tr>
		<tr>
			<td>
			<form action="index.php" method="POST" name="formlogin" onsubmit="return verifica(this)">
			<table class="centrada" width="50%">
				<tbody>
					<tr>
						<td><b>Usuario : </b> 
						<input exige="sim" maxlength="20" name="usuario" type="text" placeholder="Enter username" />
						<p></p>
						<b>Senha :</b> 
						<input exige="sim" maxlength="20" name="clave" type="password" placeholder="Enter password here" />
						<p></p>
						<input name="submit" type="submit" value="Entrar al Sistema" />
						<p></p>
						</td>
					</tr>
				</tbody>
			</table>
			</form>
			</td>
		</tr>
	</tbody>
</table>
</div>
<a href="olvideclave.php" >Olvidaste tu Clave</a>

</body>
</html>
