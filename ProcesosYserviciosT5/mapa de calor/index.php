<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mapa de Calor - Ejemplo</title>
    <!-- Se incluye el archivo JS del mapa de calor -->
    <script defer src="heatmap.js"></script>
    <style>
      /* Estilo básico para las celdas de la tabla */
      table tbody tr td {
        text-align: center;
        padding: 10px;
      }
      /* Estilos para el botón de cambio de esquema de color */
      button.toggle-color {
        margin: 10px;
        padding: 8px 16px;
        background-color: #667eea;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: Arial, sans-serif;
      }
      button.toggle-color:hover {
        background-color: #5c6fdb;
      }
    </style>
  </head>
  <body>
    <?php
      // Definición de número de columnas y filas para las tablas
      $columnas = 24;
      $filas = 108;
    ?>
    
    <h1>Tabla con Mapa de Calor</h1>
    <!-- Se asigna la clase "heatmap-table" (nueva) para que el JS la procese -->
    <!-- También se establecen los colores de texto y fondo para definir el esquema de color inicial -->
    <table class="heatmap-table" style="color:rgb(234,0,0); background:rgb(0,255,0);">
      <thead>
        <tr>
          <?php
            // Generar cabeceras de columnas
            for($i = 0; $i < $columnas; $i++){
              echo '<th>'.$i.'</th>';
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
          // Generar filas con celdas con números aleatorios
          for($i = 0; $i < $filas; $i++){
            echo '<tr>';
            for($j = 0; $j < $columnas; $j++){
              echo '<td>'.rand(1,500).'</td>';
            }
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>

    <!-- NUEVA FUNCIONALIDAD: Botón para alternar el esquema de color de la tabla -->
    <button class="toggle-color" id="toggleColorScheme">Cambiar esquema de color</button>

    

    <script>
      // NUEVA FUNCIONALIDAD: Alternar esquema de color en la tabla con mapa de calor.
      // Se define un evento para el botón que cambia los colores de texto y fondo.
      document.getElementById('toggleColorScheme').addEventListener('click', function() {
        const table = document.querySelector('.heatmap-table');
        if (!table) return;
        // Se alterna entre dos esquemas: 
        // (1) Rojo sobre verde (por defecto) y (2) Azul sobre naranja.
        const currentColor = table.style.color;
        if (currentColor === 'rgb(234, 0, 0)') {
          table.style.color = 'rgb(0, 0, 255)';      // Azul
          table.style.background = 'rgb(255, 165, 0)'; // Naranja
        } else {
          table.style.color = 'rgb(234, 0, 0)';        // Rojo
          table.style.background = 'rgb(0,255,0)';       // Verde
        }
        // Opcional: Se podría forzar la re-aplicación del mapa de calor invocando una función de heatmap.js.
      });
    </script>
  </body>
</html>
