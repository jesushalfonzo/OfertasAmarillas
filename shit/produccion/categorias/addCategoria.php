<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("CATEGORIAS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();




if((isset($_POST["nombreCat"]))&&($_POST["nombreCat"]!="")){ $nombreCat=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["nombreCat"]))); } else {$aErrores[] = "Debe especificar el nombre de la categoría";}
if((isset($_POST["descripcionCat"]))&&($_POST["descripcionCat"]!="")){ $descripcionCat=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["descripcionCat"]))); } else {$aErrores[] = "Debe especificar la descripciónd de la categoría";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_FILES["file"]))&&($_FILES["file"]!="")){ $iconoFile = $_FILES['file']['name']; }  else {$aErrores[] = "Debe Seleccionar una imagen";}

$fechacompleta=date('Y-m-d H:i:s');

if (isset($_FILES["file"])) {
	
    // CHEQUENADO LOS MIME TYPE PERMITIDOS
$finfo = new finfo(FILEINFO_MIME_TYPE);
if (false === $ext = array_search(
	$finfo->file($_FILES['file']['tmp_name']),
	array(
		    'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'ico' => 'image/vnd.microsoft.icon',
		),
	true
	)) {
	$aErrores[] = "Formato de imagen NO Permitido";
}

} 

if(count($aErrores)==0) { 

	$query = "INSERT INTO m_categorias (m_categoria_id, m_categoria_nombre, m_categoria_descripcion, m_categoria_estatus) VALUES (Null, '$nombreCat', '$descripcionCat', '$activo')";
	$resultado = mysqli_query($link, $query);
	$lastshit=mysqli_insert_id($link);

	if ($resultado) {


		//SUBO LA IMAGEN CON EL ICONO
		
		if ($iconoFile!='')
		{
			$trozos = explode(".", $iconoFile); 
			$extension = end($trozos); 




			$carpeta = '../../../multimedia/iconos/';
			$nombre_new = 'ICONO'.'_'.$lastshit.'.'.$extension;
			$nombre_temporal = 'temporal.jpg';

			if (move_uploaded_file($_FILES['file']['tmp_name'],$carpeta.$nombre_temporal)){
				$subiofoto=true;
			}else{
				$subiofoto=false;
			}

			rename($carpeta.$nombre_temporal, $carpeta.$nombre_new); 
			chmod($carpeta.$nombre_new, 0644);
			$actualizar="UPDATE m_categorias SET  m_categoria_icono='$nombre_new' WHERE m_categoria_id='$lastshit'"; 
			$resultado=mysqli_query($link,$actualizar); 
		}




		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Categoría registrada exitosamente... "
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Ocurrió un error, por favor revisar los campos"
			);
	}

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}
else{ 
	$jsondata["success"] = false;
	$jsondata["data"] = array(
		'message' => $aErrores
		);

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}


?>

