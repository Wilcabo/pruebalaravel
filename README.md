Pasos para Clonar un Repositorio
1. Obtener la URL del Repositorio
Primero, necesitas la URL del repositorio que deseas clonar. Puedes encontrar esta URL en la página del repositorio en GitHub.
El siguiente es el repositorio, es publico.

https://github.com/Wilcabo/pruebalaravel.git

2. Abrir la Terminal o Consola
Abre tu terminal o consola en tu sistema operativo. Dependiendo de tu sistema operativo, la terminal puede llamarse "Terminal" en macOS y Linux, o "Command Prompt" o "PowerShell" en Windows.
ejecutar las siguientes l9ineas

git clone https://github.com/Wilcabo/pruebalaravel.git



Pasos para Instalar Breeze
1. Instalación de Breeze
Para instalar Breeze en tu proyecto Laravel, sigue estos pasos:

Abre tu terminal y navega hasta el directorio de tu proyecto Laravel:


Ejecuta el siguiente comando para instalar Breeze:
composer require laravel/breeze 

2. Instalación de Breeze en tu Proyecto
Una vez instalado Breeze, ejecuta el siguiente comando para configurar Breeze en tu proyecto:
php artisan breeze:install

Este comando realiza varias acciones:

Configura las rutas y las vistas necesarias para la autenticación.
Instala las dependencias de frontend necesarias utilizando NPM (Node Package Manager).
3. Compilación de Assets
Después de instalar Breeze, compila los assets de tu proyecto para asegurarte de que las nuevas dependencias de frontend se integren correctamente:
npm install && npm run dev


Ingresar a la carpeta prueba desde una consola.
Ejecutar el comando:  php artisan migrate
Realizar las migraciones a la base de datos. 

Ejecuta el comando 

php artisan serve
