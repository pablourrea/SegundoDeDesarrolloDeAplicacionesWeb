<?php
// Guardo la salida en un buffer(en memoria). No se envia al navegador
ob_start();
?>

<!-- Formulario de subida de ficheros -->
<div id='aviso'>
	<b><?= (isset($msg))?$msg:"" ?></b>
</div>

<h2>Subida y alojamiento de archivo en el servidor</h2>

<!--
*    El atributo enctype del form debe valer "multipart/form-data"
*    El atributo method del form debe valer "post"
-->
<form name="f1" enctype="multipart/form-data" action="index.php?operacion=Nuevo" method="post">
  <label for="nombre">Indique su nombre</label>
  <input type="text" name="nombre"><br>

  <label for="directorio">Indique el nombre del directorio donde se ubicar el archivo</label>
  <!-- El directorio tiene que tener la ruta completa o relativa -->
  <input type="text" name="directorio"> <br>

  <!--
  *   Se fija en el cliente el tamaño máximo en bytes el limite máximo se debe tener el archivo.
  *   Se debe controlar también en el servidor (php.ini)
  -->

  <input type="hidden" name="MAX_FILE_SIZE" value="100000"> <!--  100Kbytes -->

  <label>Elija el archivo a subir</label>
  <input name="archivo1" type="file"> <br>

  <input type="submit" value="Subir">

</form>

<?php
  // Vacio el buffer y lo copio a contenido para que se muestre en el cuadro de contenido
  $contenido = ob_get_clean();
  include_once "principal.php";
?>
