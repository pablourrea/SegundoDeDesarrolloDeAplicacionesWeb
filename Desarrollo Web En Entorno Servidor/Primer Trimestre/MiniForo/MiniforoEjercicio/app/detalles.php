<div>

    <b> Detalles:</b><br>

    <table>

        <tr>
            <td>
                Longitud:          
            </td>
            <td>
                <?= strlen($_REQUEST['comentario']) ?>
            </td>
        </tr>

        <tr>
            <td>
                Nº de palabras:    
            </td>
            <td>
                <?php
                    echo str_word_count($_REQUEST['comentario'], 0);
                ?>
            </td>
        </tr>

        <tr>
            <td>
                Letra + repetida:  
            </td>
            <td>
                <?php 
                    $texto = $_REQUEST['comentario'];
                    $letras = str_split($texto);
                    $muestra = array_count_values($letras);
                    $max = 0;

                    foreach ($muestra as $key => $value){
                        if ($max < $value){
                        $max = $value;
                        $maximo = $key;
                        }
                    }
                    
                    echo $maximo;
                ?>
            </td>
        </tr>

        <tr>
            <td>
                Palabra + repetida:
            </td>
            <td>
                <?php 
                    $texto = $_REQUEST['comentario'];
                    $combiertearray = explode (" ", $texto);
                    $muestra = array_count_values($combiertearray);
                    $max = 0;

                    foreach ($muestra as $key => $value){
                        if ($max < $value){
                            $max = $value;
                            $maximo = $key;
                        }
                    }
                    
                    echo $maximo;
                ?>
            </td>
        </tr>

    </table>

</div>
