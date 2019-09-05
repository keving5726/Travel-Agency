# Travel-Agency
API - Agencia de Viajes

Proceso de Instalacion:

1. Configurar servidor web a recibir las solicitudes desde la carpeta public/index.php

2. Configurar las Variables de entorno desde el archivo .env o .env.local

Ejemplo:

APP_ENV=dev
APP_SECRET=aae2650b89c618d5d17345b56127db63
#TRUSTED_PROXIES=127.0.0.1,127.0.0.2
#TRUSTED_HOSTS='^localhost|example\.com$'
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
DATABASE_URL=mysql://kgquintero:20308233@127.0.0.1:3306/travel
###< doctrine/doctrine-bundle ###

###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN=^https?://localhost(:[0-9]+)?$
###< nelmio/cors-bundle ###

###> lexik/jwt-authentication-bundle ###
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=38f4b710297751597dcdd36e7b6b4717
###< lexik/jwt-authentication-bundle ###

3. Ejecutar la migracion de la base de datos con los siguientes comandos:

* php bin/console doctrine:migrations:migrate
* php bin/console doctrine:fixtures:load

4. Comprobar la instalacion viendo la interfaz de API PLATFORM desde la ruta http://localhost/api/

Proceso de Uso:

1. Rutas:

Usuarios:
GET /api/usuarios (Ver todos los usuarios.)

POST /api/usuarios (Crear un usuario.)
{
  "cedula": "string",
  "password": "string",
  "nombre": "string",
  "apellido": "string",
  "direccion": "string",
  "telefono": "string"
}

GET /api/usuarios/{id} (Ver información de un usuario.)
Se debe colocar el id en la url.

DELETE /api/usuarios/{id} (Borrar un usuario.)
Se debe colocar el id en la url.

PUT /api/usuarios/{id} (Modificar un usuario.)
Se debe colocar el id en la url.
{
  "cedula": "string",
  "password": "string",
  "nombre": "string",
  "apellido": "string",
  "direccion": "string",
  "telefono": "string"
}

Viajes:
GET /api/viajes (Ver todos los viajes.)

POST /api/viajes (Crear un viaje.)
{
  "codigo": "string",
  "plazas": 0,
  "origen": "string",
  "destino": "string",
  "precio": 0
}

GET /api/viajes/{id} (Ver información de un viaje.)
Se debe colocar el id en la url.

DELETE /api/viajes/{id} (Borrar un viaje.)
Se debe colocar el id en la url.

PUT /api/viajes/{id} (Modificar un viaje.)
Se debe colocar el id en la url.
{
  "codigo": "string",
  "plazas": 0,
  "origen": "string",
  "destino": "string",
  "precio": 0
}

Nota: Todas las rutas estan sin restricciones por motivos de pruebas,
pero deben ser restringidas según los roles de los usuarios.
Una ultima ruta para obtener un JSON Web Token.

POST /authentication_token (Obtener un JSON Web Token (JWT.)
{
  "username": "cedula del usuario",
  "password": "contraseña del usuario"
}

Para una mejor documentación ir a la ruta http://localhost/api
