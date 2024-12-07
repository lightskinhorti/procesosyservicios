onmessage = function(datos) {
  console.log("Worker arrancado, vamos a trabajar");
  
  // Recorro cada píxel de la imagen (cada píxel está representado por 4 valores: R, G, B, A)
  for (let i = 0; i < datos.data.length; i += 4) {  // Cada píxel tiene 4 valores (R, G, B, A)
      let r = datos.data[i];     // Rojo
      let g = datos.data[i + 1]; // Verde
      let b = datos.data[i + 2]; // Azul

      // Si quieres aplicar un poco más de cálculos para "estresar" al procesador
      // sin efectos visibles, puedes hacer algo similar pero sin hacer loops innecesarios.
      for (let j = 0; j < 100; j++) {
          r *= 1.00000000045;
          g *= 1.00000000045;
          b *= 1.00000000045;
      }

      // Cálculo de gris: para mejor contraste, usamos una ponderación de colores.
      let gris = Math.round(r * 0.3 + g * 0.59 + b * 0.11); // Promedio ponderado (más realista)

      // Asigno el mismo valor a R, G, B para obtener la escala de grises
      datos.data[i] = gris;     // Rojo
      datos.data[i + 1] = gris; // Verde
      datos.data[i + 2] = gris; // Azul
  }

  // Cuando terminamos el procesamiento, enviamos los datos al hilo principal
  console.log("Worker finalizado, devolvemos los datos al hilo principal");
  postMessage(datos.data);
};
