# Formulario de Contacto con Envío de Email usando PHPMailer

Esta es una aplicación PHP que permite a los usuarios enviarte un mensaje a través de un formulario. Utiliza **PHPMailer** para manejar el envío de correos electrónicos de manera segura y confiable.

## Características

- Formulario de contacto sencillo para que los usuarios ingresen su nombre, correo electrónico y mensaje.
- Envío de mensajes a tu correo electrónico configurado.
- Validación básica de datos para garantizar que los campos obligatorios estén completos.
- Uso de **PHPMailer** para facilitar el envío de correos electrónicos mediante SMTP.

## Requisitos previos

Antes de comenzar, asegúrate de que tu máquina cumpla con los siguientes requisitos:

- [PHP](https://www.php.net/downloads) (versión 7.4 o superior)
- [Composer](https://getcomposer.org/download/) para gestionar las dependencias.
- Una cuenta de correo (por ejemplo, Gmail, Outlook, etc.) para enviar y recibir mensajes.
- Un servidor local como XAMPP, WAMP, Laragon o el servidor integrado de PHP.

## Instalación

1. **Clonar el repositorio**  
   Clona este repositorio en tu máquina local:
   ```bash
   git clone https://github.com/repositorio.git
   ```
2. **Moverse al directorio del proyecto**
   Navega al directorio del proyecto:
   ```bash
   cd tu-repositorio
   ```
3. **Instalar dependencias con Composer**
   ```bash
   composer install
   ```
4. **Archivo de configuración de correo**
   Crea un archivo .env en la raíz del proyecto para almacenar las credenciales de tu cuenta de correo. Puedes copiar el archivo de ejemplo:
   ```bash
   cp .env.example .env
   ```
   En el archivo .env, configura los detalles de tu cuenta de correo gmail.
5. **Iniciar el servidor integrado de PHP**
   Para pruebas locales, puedes usar el servidor integrado de PHP:
   ```bash
   php -S localhost:8000
   ```