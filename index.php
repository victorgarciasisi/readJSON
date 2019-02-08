<?php
// index.php

// ubicacion JSON online y local
define('JSON', 'http://datos.gijon.es/doc/turismo/playas.json');
define('JSONlocal', 'playas.json'); 

// leer JSON validamos si el fichero online e accesible y si no abrimos el json local
if($data = @file_get_contents(JSON)){
	$items = json_decode($data, true);
}
else{
	$data = file_get_contents(JSONlocal);
	$items = json_decode($data, true);
}


//lista de items a recorrer
$listaItems = $items["directorios"]["directorio"];
?>

<html>
<h1>Playas de Gijón</h1>

<?php
	//bucle para recorrer los elementos del array
	for ($i = 0; $i<count($listaItems); $i++){
?>
	<table border="1">
		<tr>
			<td>Nombre: </td>
			<td>
				<?php echo $listaItems[$i]["nombre"]["content"]; ?>	
			</td>
		</tr>
		<tr>
			<td>URL: </td>
			<td>
				<?php echo $listaItems[$i]["url"]; ?>
			</td>
		</tr>
		<tr>
			<td>Descripcion: </td>
			<td>
				<?php echo $listaItems[$i]["descripcion"]["content"]; ?>
			</td>
		</tr>
		<tr>
			<td>Direccion: </td>
			<td>
				<?php echo $listaItems[$i]["direccion"][0]; ?>
			</td>
		</tr>
		<tr>
			<td>Foto: </td>
			<td>
				<?php echo '<img src=' . $items['directorios']['directorio'][$i]['foto']['content'] . '/>'; ?>
			</td>
		</tr>
		<tr>
			<td>Localizacion: </td>
			<td>
				<?php echo '<a href="https://www.google.com.br/maps/place/' . 
					$items['directorios']['directorio'][$i]['localizacion']['content'] . '">' . 
					$items['directorios']['directorio'][$i]['localizacion']['content'] . '</a>'; ?>
			</td>
		</tr>
	</table><br />
<?php 
	} //cerramos bucle
?>

</html>