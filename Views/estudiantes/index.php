<?php 

	//var_dump($datos);
	while($row = mysqli_fetch_array($datos) ){
	 	echo $row['nombre'] . '<br>';
	}
 ?>	
