	<?php 
	function Conectarse()
	{ 
		if (!($link=mysqli_connect('localhost', 'tuidenti_digiusu', '*tu1d3ntiD1d.-', 'tuidenti_amarillas')))
		{ 

			echo "Error conectando a la base de datos."; 

			exit(); 

		} 
		return $link; 

	} 

	?>