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
if((isset($_POST["idCategory"]))&&($_POST["idCategory"]!="")){ $idCategory=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idCategory"]))); } else {$aErrores[] = "NO SE HA ESPECIFICADO UN ID";}
if((isset($_FILES["file"]))&&($_FILES["file"]!="")){ $iconoFile = $_FILES['file']['name']; $chageImage=true; }  else {$chageImage=false;}



$fechacompleta=date('Y-m-d H:i:s');




if (isset($_FILES["file"]) and ($chageImage)) {
	
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

	$query = "UPDATE m_categorias  SET m_categoria_nombre='$nombreCat', m_categoria_descripcion='$descripcionCat' , m_categoria_estatus='$activo' WHERE m_categoria_id='$idCategory'";
	$resultado = mysqli_query($link, $query);

	if ($resultado) {


//SUBO LA IMAGEN CON EL ICONO
		
		if ($iconoFile!='')
		{
			$trozos = explode(".", $iconoFile); 
			$extension = end($trozos); 
			$carpeta = '../../../multimedia/iconos/';
			$nombre_new = 'ICONO'.'_'.$idCategory.'._'.rand().$extension;
			$nombre_temporal = 'temporal.jpg';

			if (move_uploaded_file($_FILES['file']['tmp_name'],$carpeta.$nombre_temporal)){
				$subiofoto=true;
			}else{
				$subiofoto=false;
			}

			rename($carpeta.$nombre_temporal, $carpeta.$nombre_new); 
			chmod($carpeta.$nombre_new, 0644);
			$actualizar="UPDATE m_categorias SET  m_categoria_icono='$nombre_new' WHERE m_categoria_id='$idCategory'"; 
			$resultado=mysqli_query($link,$actualizar); 
		}



		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Categoría actualizada exitosamente..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Ocurrió un error, por favor revisar los campos ".$query 
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

