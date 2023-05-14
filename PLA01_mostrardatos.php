<?php



// Sistema antigui, Inicializar variables que se utilicen en el documento HTML
// para eviar un warnning en caso de que la variable no exista
//  $mensajes = null; (se posiciona aquí mismo)

// el nuevo método
//<?php echo $mensajes ?? null; (cerrar php) se posiciona donde va el mensaje

// Recuperar los datos de la petición 
// trim() elimina los espacios en blanco al principio y al fina, no en medio.
$nif = trim($_POST['nif']);
$nombre = trim($_POST['nombre']);
$apellidos = trim($_POST['apellidos']);
$email = trim($_POST['email']);
$nota = trim($_POST['nota']);

// Validaciones redundantes, validar también en el servidor, siempre con try catch

try {
	// validación de datos
	$errores = '';

	if (empty($nif)) {
		$errores .= 'Nif ogligatorio<br>';
	}

	if (empty($nombre)) {
		$errores .= "Nombre obligatorio<br>";
	}

	if (empty($apellidos)) {
		$errores .= "Apellido obligatorio<br>";
	}

	if (empty($email)) {
		$errores .= "Email obligatorio<br>";
	}
	if ($nota == "") {
		$errores .= "Nota obligatoria<br>";
	} else {
		if ($nota < 0 || $nota > 10) {
			$errores .= "nota fuera de rango";
		}
	}

	if (!empty($errores)) {
		throw new Exception($errores);
	}

	/*
	EVALUAR LA NOTA
	Entre 0 y <5 -> suspenso
	Entre 5 y <6 -> aprobado
	Entre 6 y <7 -> bien
	Entre 7 y <9 -> notable
	Entre 9 o mayor -> excelente

	*/
	//operativa que dependa de las validaciones

	if ($nota < 5) {
		$evaluacion = 'Suspenso';
	} else if ($nota >= 5 && $nota < 6) {
		$evaluacion = 'Aprobado';
	} else if ($nota >= 6 && $nota < 7) {
		$evaluacion = 'bien';
	} else if ($nota >= 7 && $nota < 9) {
		$evaluacion = 'Notable';
	} else {
		$evaluacion = 'Excelente';
	}
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
			<input type="text" placeholder="nif" disabled value='<?php echo $nif; ?>'><br><br>
			<input type="text" placeholder="nom" disabled value='<?php echo $nombre; ?>'>
			<input type="text" placeholder="cognoms" disabled value='<?php echo $apellidos; ?>'><br><br>
			<input type="text" placeholder="qualificació" disabled value='<?php echo $evaluacion ?? null; ?>'>
<?php 
	for ($n = 0; $n <= $nota; $++) {
		if ($n < 5) {
			echo "<aside class ='red'> </aiide>";
		}
	}
?>
			<!--aqui iran las cajitas <aside></aside>-->


			<br><br>
			<input type="text" placeholder="email" disabled value=''><br><br>
			<textarea cols='22' rows='5' disabled></textarea>
			<p class='errores'><?php echo $mensajes ?? null; ?></p>
		</div>
	</div>
</body>

</html>