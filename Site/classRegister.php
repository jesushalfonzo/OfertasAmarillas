<?php 

include('extras/conexion.php');
$link=Conectarse();



header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["correo"]))&&($_POST["correo"]!="")){ $emailCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["correo"]))); } else {$aErrores[] = "Es obligatoria colocar un email";}
if((isset($_POST["cedula"]))&&($_POST["cedula"]!="")){ $cedulaCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["cedula"]))); } else {$aErrores[] = "Es obligatoria especificar la cédula";}
if((isset($_POST["telefono"]))&&($_POST["telefono"]!="")){ $telefono=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["telefono"]))); } else {$aErrores[] = "Debe introducir un número de teléfono";}
if((isset($_POST["nombre"]))&&($_POST["nombre"]!="")){ $nombre=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["nombre"]))); } else {$aErrores[] = "Debe indicar un nombre de contacto";}
if((isset($_POST["apellido"]))&&($_POST["apellido"]!="")){ $apellido=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["apellido"]))); } else {$aErrores[] = "Debe introducir su apellido";}
if((isset($_POST["password"]))&&($_POST["password"]!="")){ $passwordCliente=md5(strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["password"])))); } else {$aErrores[] = "Debe introducir un password";}
if((isset($_POST["passwordrepite"]))&&($_POST["passwordrepite"]!="")){ $passwordrepite=md5(strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["passwordrepite"])))); } else {$aErrores[] = "Debe repetir la clave";}
if((isset($_POST["genero"]))&&($_POST["genero"]!="")){ $genero=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["genero"]))); }
if((isset($_POST["terminos"]))&&($_POST["terminos"]!="")){ $terminos=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["terminos"]))); } else {$aErrores[] = "Debe aceptar los términos y condiciones";}
if((isset($_POST["newsletter"]))&&($_POST["newsletter"]!="")){ $newsletter=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["newsletter"]))); } else {$newsletter="0";}
$nombreCliente=$nombre." ".$apellido;



$fechacompleta=date('Y-m-d H:i:s');



//PARA VALIDAR SI EL USUARIO EXISTE EN LA BD CONSULTO SI YA EL RIF EXISTE
	$queryVal = "SELECT m_cliente_id FROM  m_clientes WHERE m_cliente_rif='".mysqli_real_escape_string($link, $cedulaCliente)."'";
	$resultadoVal = mysqli_query($link, $queryVal);
	$existe=mysqli_num_rows($resultadoVal);
	if ($existe >0) {
		$aErrores[] ="Ya esta cédula está registrada en el sistema";
	}


//PARA VALIDAR SI EL USUARIO EXISTE EN LA BD CONSULTO SI YA EL RIF EXISTE
	$queryVal = "SELECT m_cliente_id FROM  m_clientes WHERE m_cliente_mail='".mysqli_real_escape_string($link, $emailCliente)."'";
	$resultadoVal = mysqli_query($link, $queryVal);
	$existe=mysqli_num_rows($resultadoVal);
	if ($existe >0) {
		$aErrores[] ="Ya esta dirección de correo ha sido registrada por otro usuario";
	}


//PARA VALIDAR QUE NO LAS CLAVES COINCIDAN
if ($passwordCliente!=$passwordrepite) {
	$aErrores[]="Las claves no coinciden";
}



if(count($aErrores)==0) { 

	$query = "INSERT INTO m_clientes (m_cliente_id, m_cliente_nombreContacto, m_cliente_rif, m_cliente_mail, m_cliente_telefonoContacto, m_cliente_password, m_cliente_estatus, m_cliente_verificado,  m_cliente_fecharegistro, m_cliente_tipoCliente, m_cliente_newsletter) VALUES (Null, '$nombreCliente', '$cedulaCliente', '$emailCliente', '$telefono', '$passwordCliente', 1, 1, '$fechacompleta', '2', '$newsletter')";
	$resultado = mysqli_query($link, $query);

	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Registro realizado correctamente..."
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