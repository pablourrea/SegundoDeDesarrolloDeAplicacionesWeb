<?php 
 if(isset($_POST['legajo'])){ 
    //Guarda el legajo que llego v�a ajax. en una varibale.
    $legajo = $_POST['legajo'];
    //Lista de empleados.
    $empleados = array(
       array('legajo' => '10001', 'nombre' => 'Marie', 'apellido' => 'Courie', 'departamento' => 'Estadisticas'),
       array('legajo' => '10002', 'nombre' => 'Humildad', 'apellido' => 'Vivas', 'departamento' => 'Recursos humanos'),
       array('legajo' => '10003', 'nombre' => 'Albert', 'apellido' => 'Einstein', 'departamento' => 'Sistemas')
    );
    //Variable que guardar� los datos del empleado a buscar. Por defecto guardar� null.
    $empleado = null;
    foreach($empleados as $item){
       //Verifica si el legajo es uno de los que est� en la lista.
       if($item['legajo'] == $legajo){
       //Guarda los datos del empleado que fue encontrado y finaliza el ciclo del foreach.
          $empleado = $item;
          break;
       }
    }
    //Devuelve la respuesta de si lo encontr� o no
    if($empleado){
        //Lo encontr� as� que devuelve los datos del empleado en forma de cadena.
        echo 'Nombre y apellido: ' . $empleado['nombre'] . ' ' . $empleado['apellido'] . ' / Departamento: ' . $empleado['departamento'];
    }else{
       //No encontr� al usuario.
       echo 'El numero de legajo no le corresponde a ningun empleado';
    }

 }else{
    echo ':(';
 }

?>