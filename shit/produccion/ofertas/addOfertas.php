<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("OFERTAS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["tituloOferta"]))&&($_POST["tituloOferta"]!="")){ $tituloOferta=strip_tags(mysqli_real_escape_string($link, $_POST["tituloOferta"])); } else {$aErrores[] = "El titulo de la oferta no puede estar vacío";}
if((isset($_POST["cantidadCupones"]))&&($_POST["cantidadCupones"]!="")){ $cantidadCupones=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["cantidadCupones"]))); } else {$aErrores[] = "Debe especificar la cantidad de cupones a ofertar";}
if((isset($_POST["categoriaOferta"]))&&($_POST["categoriaOferta"]!="")){ $categoriaOferta=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["categoriaOferta"]))); } else {$aErrores[] = "Debe especificar la categoría de la oferta";}
if((isset($_POST["porcentajeAhorro"]))&&($_POST["porcentajeAhorro"]!="")){ $porcentajeAhorro=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["porcentajeAhorro"]))); } else {$aErrores[] = "Debe indicar el porcentaje de ahorro";}
if((isset($_POST["valorCupon"]))&&($_POST["valorCupon"]!="")){ $valorCupon=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["valorCupon"]))); } else {$aErrores[] = "Debe indicar el valor del cupón";}
if((isset($_POST["validoDesde"]))&&($_POST["validoDesde"]!="")){ $validoDesde=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["validoDesde"]))); } else {$aErrores[] = "Debe indicar desde que fecha es válida la oferta";}
if((isset($_POST["validoHasta"]))&&($_POST["validoHasta"]!="")){ $validoHasta=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["validoHasta"]))); } else {$aErrores[] = "Debe indicar hasta que fecha es válida la oferta";}
if((isset($_POST["categoriaOferta"]))&&($_POST["categoriaOferta"]!="")){ $categoriaOferta=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["categoriaOferta"]))); } else {$aErrores[] = "Debe especificar la categoría de la oferta";}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=mysqli_real_escape_string($link, $_POST["descripcion"]); } else {$aErrores[] = "La descripción de la oferta no puede estar vacía";}
if((isset($_POST["clienteVendedor"]))&&($_POST["clienteVendedor"]!="")){ $idCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["clienteVendedor"]))); } else {$aErrores= "Debe especificar a que cliente pertenece la oferta";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_POST["verificacion"]))&&($_POST["verificacion"]!="")){ $verificacion=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["verificacion"]))); } else {$verificacion=0;}
if((isset($_POST["idsImagenes"]))&&($_POST["idsImagenes"]!="")){ $idsImagenes=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idsImagenes"]))); } else {$aErrores[] = "La oferta debe contener por lo menos una imagen";}

$fechacompleta=date('Y-m-d H:i:s');
$validoDesde=date('Y-m-d H:i:s', strtotime($validoDesde));
$validoHasta=date('Y-m-d H:i:s', strtotime($validoHasta));
$valorCupon=str_replace("US$", "", $valorCupon);


if(count($aErrores)==0) { 

	$query = "INSERT INTO m_ofertas (m_oferta_id, m_oferta_idCliente, m_oferta_idCategoria, m_oferta_titulo, m_oferta_descripcion, m_oferta_cantidad, m_oferta_precioCupon, m_oferta_porcentajeAhorro, m_oferta_fecha, m_oferta_fechaInicio, m_oferta_fechaFin, m_oferta_estusActivado, m_oferta_estatusVerificado) VALUES (Null, '$idCliente', '$categoriaOferta', '$tituloOferta', '$descripcion', '$cantidadCupones', '$valorCupon', '$porcentajeAhorro', '$fechacompleta', '$validoDesde', '$validoHasta', '$activo', '$verificacion')";
	$resultado = mysqli_query($link, $query);
	$lasid=mysqli_insert_id($link);

	$imagenes = explode(",", $idsImagenes);
	foreach ($imagenes as $valor) {
		$SQLimg="UPDATE r_medias SET r_media_idOferta='$lasid' WHERE r_media_id='$valor'";
		$queryimg=mysqli_query($link, $SQLimg);
	}
	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Oferta registrada exitosamente..."
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