<?php
session_start();
header('Content-type: application/json; charset=utf-8');
include("extras/conexion.php");
$link=Conectarse();
$aErrores=array();
$jsondata = array();

if((isset($_POST["userlogin"]))&&($_POST["userlogin"]!="")){ $login=strip_tags(htmlentities($_POST["userlogin"])); } else {$aErrores[] = "Debe introducir el login";}
if((isset($_POST["userpassword"]))&&($_POST["userpassword"]!="")){ $password=md5(strip_tags(htmlentities($_POST["userpassword"]))); } else {$aErrores[] = "El password no puede estar vacío";}
$ipcliente=getRealIP($_SERVER['REMOTE_ADDR']);
$fechacompleta=date('Y-m-d H:i:s');

if(count($aErrores)==0) { 

	//PARA VALIDAR SI EL USUARIO EXISTE EN LA BD
	$query = "SELECT * FROM  m_clientes WHERE m_cliente_mail='".mysqli_real_escape_string($link, $login)."' AND m_cliente_password='".mysqli_real_escape_string($link, $password)."'";
	$resultado = mysqli_query($link, $query);
	$existe=mysqli_num_rows($resultado);

	if ($existe >0) {
		

		//SI EXISTE SACOS SUS DATOS Y CREO LAS VARIABLES DE SESION 
		$row=mysqli_fetch_array($resultado);
		$m_cliente_id=$row["m_cliente_id"];
		$nombre_usuario=$row["m_cliente_nombreContacto"];
		$usuario_id=$row["m_usuario_id"];
		$m_cliente_tipoCliente=$row["m_cliente_tipoCliente"];

		ini_set('session.gc_maxlifetime',7200);   
		$_SESSION["AMARILLASw3bFront"]= '4m4r1ll4as0F3rtasFronT3nd';
		$_SESSION['usuarioL0g3ad0Front']=$login;
		$_SESSION['nombreUSUcmpletoFront']=$nombre_usuario;
		$_SESSION["1dusuar10Front"]=$m_cliente_id;
		$_SESSION["AMARILLASw3bFrontT1p0"]=$m_cliente_tipoCliente;


		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Ingresando..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Combinación Usuario/Password incorrecta"
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

function getRealIP()
{
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){$obtener=$_SERVER["HTTP_X_FORWARDED_FOR"];}else{$obtener="";}
	if($obtener != '')
	{
		$client_ip = 
		( !empty($_SERVER['REMOTE_ADDR']) ) ? 
		$_SERVER['REMOTE_ADDR'] 
		: 
		( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
			$_ENV['REMOTE_ADDR'] 
			: 
			"unknown" );

		$entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

		reset($entries);
		while (list(, $entry) = each($entries)) 
		{
			$entry = trim($entry);
			if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
			{
				$private_ip = array(
					'/^0\./', 
					'/^127\.0\.0\.1/', 
					'/^192\.168\..*/', 
					'/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
					'/^10\..*/');

				$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

				if ($client_ip != $found_ip)
				{
					$client_ip = $found_ip;
					break;
				}
			}
		}
	}
	else
	{
		$client_ip = 
		( !empty($_SERVER['REMOTE_ADDR']) ) ? 
		$_SERVER['REMOTE_ADDR'] 
		: 
		( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
			$_ENV['REMOTE_ADDR'] 
			: 
			"unknown" );
	}

	return $client_ip;

}
?>