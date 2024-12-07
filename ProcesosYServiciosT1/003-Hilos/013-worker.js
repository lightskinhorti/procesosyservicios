onmessage = function(evento) {
    console.log("Worker iniciado, procesando datos...");

    // Accedo a los datos de la imagen pasados desde el hilo principal
    let datos = evento.data;

    // Recorro los datos de cada pixel (en formato RGBA) con un paso de 4 para trabajar con cada canal de color
    for (let i = 0; i < datos.length; i += 4) {
        // Extraigo los valores de los canales de color (Rojo, Verde, Azul)
        let c = datos;

        /* Operación de Umbral: Conversión a blanco y negro en base al valor del canal rojo
         * Si el valor del canal rojo es menor que 100, lo convierto en negro (0,0,0).
         * Si es mayor o igual a 100, lo convierto en blanco (255,255,255).
         */
        if (c[i] < 100) {
            c[i] = 0;       // Canal Rojo a 0 (negro)
            c[i + 1] = 0;   // Canal Verde a 0 (negro)
            c[i + 2] = 0;   // Canal Azul a 0 (negro)
        } else {
            c[i] = 255;     // Canal Rojo a 255 (blanco)
            c[i + 1] = 255; // Canal Verde a 255 (blanco)
            c[i + 2] = 255; // Canal Azul a 255 (blanco)
        }
    }

    // Terminé el procesamiento, ahora envío los datos procesados de vuelta al hilo principal
    console.log("Worker finalizado, enviando datos procesados al hilo principal.");
    postMessage(datos);
};
