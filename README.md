## Instalación

1. Instala las dependencias de Node.js utilizando npm:

    ```bash
    npm install
    ```

2. Modifica el archivo `js/config.js` en y establece la variable `API_URL` con la URL de la API que deseas utilizar:

    ```javascript
    // config.js
    const API_URL = 'url de la API';
    
    module.exports = {
        API_URL
    };
    ```

## Ejecución

- `npm start`: Inicia el servidor en modo desarrollo.
- `npm run build`: Compila los archivos para producción.

## Configuración del Servidor

1. Navega hasta la carpeta `server`:

    ```bash
    cd server
    ```

2. Usa Composer para instalar las dependencias del servidor:

    ```bash
    composer install
    ```

3. Crea el archivo `config.php` a partir de archivo del ejemplo `config.example.php` y cofigura las constantes para hacer uso de la API del Mailjet.