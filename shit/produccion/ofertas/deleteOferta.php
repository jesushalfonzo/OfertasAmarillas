<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idOferta"]))&&($_GET["idOferta"]!="")){ $idOferta=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idOferta"]))); } else {$idOferta=0;}

if (!control_access("OFERTAS", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
	echo "<script language='JavaScript'>document.location.href='../index.php';</script>";
}


//NO SE PERMITE BORRAR OFERTAS CON VENTAS YA REGISTRADAS PORQUE COMPROMETE LA INTEGRIDAD DE LA BD
$SQLcheck="SELECT m_venta_id FROM m_ventas WHERE m_venta_idOferta='$idOferta'";
$queryCheck=mysqli_query($link, $SQLcheck);
$numero=mysqli_num_rows($queryCheck);
if ($numero > 0) {
	$aErrores[]="No se puede borrar una oferta que ya posee ventas registradas";
}

//NO SE PERMITE BORRAR UNNA OFERTA QUE SE ENCUENTRA ACTIVA
$SQLcheckActivo="SELECT m_oferta_estusActivado FROM m_ofertas WHERE m_oferta_id='$idOferta'";
$queryCheckActivo=mysqli_query($link, $SQLcheckActivo);
$row=mysqli_fetch_array($queryCheckActivo);
$m_oferta_estusActivado=$row["m_oferta_estusActivado"];
if ($m_oferta_estusActivado) {
	$aErrores[]="No se puede borrar una oferta que se encuentra activa, por favor desactivarla primero";
}


if(count($aErrores)==0) { 

	$query = "DELETE FROM m_ofertas  WHERE m_oferta_id='$idOferta' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "La Oferta ha sido borrada"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar la categoría"
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
