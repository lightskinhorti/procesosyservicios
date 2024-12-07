// El Worker escucha los mensajes enviados desde el hilo principal
onmessage = function (datos) {
  console.log("Hola, soy el núcleo", datos.data); // Muestra el mensaje recibido desde el hilo principal

  // Descomentar para realizar una tarea intensiva en recursos
  /*
  let numero = 1.0000000054;  // Valor inicial de una operación matemática simulada
  let iteraciones = 10000000000; // Número de iteraciones para simular el trabajo
  for (let i = 0; i < iteraciones; i++) {
      numero *= 1.000000000076; // Cálculo repetitivo para simular carga de trabajo
  }
  */

  // Enviar un mensaje de vuelta al hilo principal
  postMessage("¡Hola desde el Worker! El proceso ha terminado.");
}
