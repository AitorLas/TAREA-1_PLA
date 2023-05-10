<?php
// Recuperar los datos de la petición
$nif = $_POST['nif'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$nota = $_POST['nota'];

// Validaciones redundantes, validar también en el servidor, siempre con try catch

try {
	// validación de datos
	if ($nif == '') {
		throw new Exception('Nif ogligatorio');
	}

	//operativa que dependa de las validaciones
} catch (Exception $error) {
	// Operativa a ejecutar en caso de error
	// para ejecutar un métdo (getMessage) de un objeto ($error) se utiliza en php la flecha ->,
	// $mensajes es otro objeto
	$mensajes = $error->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css?v=1.0">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: MOSTRAR DADES</h1>
		<div class='card'>
			<input type="text" placeholder="nif" disabled value=''><? echo $nif; ?><br><br>
			<input type="text" placeholder="nom" disabled value=''>
			<input type="text" placeholder="cognoms" disabled value=''><br><br>
			<input type="text" placeholder="qualificació" disabled value=''>
			<!--aqui iran las cajitas <aside></aside>-->
			<br><br>
			<input type="text" placeholder="email" disabled value=''><br><br>
			<textarea cols='22' rows='5' disabled><?php echo $mensajes; ?></textarea>
			<p class='errores'></p>
		</div>
	</div>
</body>

</html>