<?php
    ///////////////////// TAREAS //////////////////////////

    // Ruta al archivo de tareas
    $file = 'tareas.txt';  

    // Lee el contenido del archivo de tareas y lo guarda en un array
    $lines = file($file);  

    // Se toma la primera tarea (la primera línea del archivo)
    $tarea = $lines[0];  

    // Envía la primera tarea al cliente (JavaScript)
    echo $lines[0];  

    // Elimina la primera línea (la tarea ya asignada)
    array_shift($lines);  

    // Guarda las líneas restantes en el archivo, sobrescribiendo el archivo original
    file_put_contents($file, implode('', $lines));  

    ///////////////////// ASIGNACIONES //////////////////////

    // Abre el archivo de asignaciones para agregar una nueva entrada
    $myfile = fopen("asignaciones.txt", "a");  

    // Prepara el texto con la tarea asignada al usuario, capturado desde la URL
    $txt = "Al usuario " . htmlspecialchars($_GET['usuario']) . " le ha tocado la tarea: " . $tarea . "\n";  

    // Escribe el registro de asignación en el archivo
    fwrite($myfile, $txt);  

    // Cierra el archivo después de escribir
    fclose($myfile);  
?>
