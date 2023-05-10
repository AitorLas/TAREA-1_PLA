<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: FORMULARI</h1>
		<form method="post" action="PLA01_mostrardatos.php" novalidate>
			<label for='nif'>Nif: </label>
			<input type="text" name="nif" id='nif' required><br><br>
			<label for='nombre'>Nom</label>
			<input type="text" name="nombre" id='nombre' required><br><br>
			<label for='apellidos'>Gognoms</label>
			<input type="text" name="apellidos" id='apellidos' required><br><br>
			<label for='email'>Email</label>
			<input type="email" name="email" id='email' required><br><br>
			<label for='nota'>Nota exàmen</label>
			<input type="number" name="nota" id='nota' required min='0' max='10'><br><br>

			<label for='mensaje'>Missatge</label>
			<textarea name='mensaje' id='mensaje' cols='22' rows='5'> </textarea><br><br>
			<label></label>
			<input type="submit" name="Enviar">
		</form>
	</div>
</body>

</html>