<?php
    ///////////////////// RESULTADOS /////////////////////////////////////////////////

    // Verificar si el parámetro 'resultado' ha sido enviado
    if (isset($_GET['resultado'])) {
        // Captura el resultado desde la URL y lo valida para evitar inyecciones maliciosas
        $resultado = intval($_GET['resultado']);  // Convertimos a entero para asegurar la seguridad de la variable

        // Ruta al archivo donde se guardarán los resultados
        $file = 'resultados.txt';  

        // Preparamos el texto a escribir en el archivo
        $txt = "Resultado recibido: " . $resultado . "\n";  

        // Abre el archivo para agregar un nuevo resultado
        $myfile = fopen($file, "a");  

        // Escribe el resultado en el archivo
        fwrite($myfile, $txt);  

        // Cierra el archivo
        fclose($myfile);  

        // Responder con un mensaje de confirmación
        echo "Resultado procesado correctamente: " . $resultado;
    } else {
        // Si no se recibe el parámetro 'resultado', respondemos con un error
        echo "Error: No se ha recibido el resultado.";
    }
?>
