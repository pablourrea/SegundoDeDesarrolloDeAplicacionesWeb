<!DOCTYPE html>
<!--
   4- Crear una carpeta que se llame img y copiar en ella 5 ficheros de imágenes que muestre el logo de un deporte. 
    Crear una array asociativo que almacene como clave el nombre del deporte y como valor la dirección de la imagen.
    
    Mostrar una tabla HTML donde con el siguiente formato:
    
    +---------------+----------+
    |    Deporte    |   Logo   |
    +---------------+----------+
    |   (Nombre)    | (Imagen) |
    +---------------+----------+
    .
    .
    .
-->
<html>
	<head>
		<title>Ejercicio 4 (3)</title>
		<style>
		  table{
		      border-collapse: collapse;
		  }
		  th, td{
		      border: 2px solid black;
		      padding: 10px;
		      text-align: center;
		  }
		  img{
		      width: 80px;
		      height: 80px;
		  }
		</style>
	</head>
	<body>
		<?php
		  $deportes = array();
		  $deportes = ["Esquí" => "./Img/skiing.jpg", "Snowboard" => "./Img/snowboarding.jpg", "Tenis" => "./Img/tenis.jpg", "Balonmano" => "./Img/handball.jpg", "Bolos" => "./Img/bowling.jpg"];
		  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		  echo "
            <center>
                <table>
                    <tr>
                        <th>Deporte</th>
                        <th>Logo</th>
                    </tr>
          ";
		  foreach($deportes as $clave => $valor){
		      echo "
                <tr>
                    <td>".$clave."</td>
                    <td><img src='".$valor."'></img></td>
                </tr>  
              ";
		  }
		  echo "
                </table>
            </center>
          ";
		?>
	</body>
</html>