from flask import Flask, request, jsonify
from flask_cors import CORS

# Lista global para almacenar los mensajes
mensajes = []

# Crear una instancia de la aplicación Flask
app = Flask(__name__)

# Habilitar CORS para permitir peticiones desde diferentes dominios
CORS(app)

# Ruta raíz para mostrar un saludo
@app.route('/')
def inicio():
    """
    Ruta principal que responde con un mensaje de saludo.
    """
    return "Hola mundo"  # Retorna un saludo en formato texto

# Ruta para obtener todos los mensajes almacenados
@app.route('/dame', methods=['GET'])
def dame():
    """
    Ruta que devuelve todos los mensajes almacenados en formato JSON.
    """
    return jsonify(mensajes)  # Devuelve los mensajes como una respuesta JSON

# Ruta para agregar un nuevo mensaje
@app.route('/toma', methods=['GET'])
def toma():
    """
    Ruta que recibe un mensaje y un usuario desde los parámetros de la URL,
    los almacena y devuelve una respuesta de éxito.
    """
    mensaje = request.args.get('mensaje')  # Obtiene el mensaje de la URL
    usuario = request.args.get('usuario')  # Obtiene el usuario de la URL
    
    # Verifica si los parámetros necesarios están presentes
    if not mensaje or not usuario:
        return jsonify({"error": "Faltan parámetros 'mensaje' o 'usuario'"}), 400
    
    # Añadir el nuevo mensaje a la lista global
    mensajes.append({'mensaje': mensaje, 'usuario': usuario})
    
    # Devuelve una respuesta de éxito
    return jsonify({"mensaje": "ok"}), 200

# Ejecutar la aplicación Flask
if __name__ == '__main__':
    # Ejecuta el servidor en modo de desarrollo, con IP 192.168.1.41
    app.run(debug=True, host='192.168.1.41', port=5000)
