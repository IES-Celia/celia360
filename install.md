# CELIA360 - NOTAS DE INSTALACIÓN

Celia360 debe desplegarse en servidor como cualquier otra aplicación web.
El procedimiento general es:

1. Mover todo el código fuente a un directorio del servidor accesible vía web.
2. Crear una base de datos MySQL o MariaDB vacía.
3. Configurar el archivo /application/config/database.php, especificando:
    - Host de la base de datos.
    - Nombre de la base de datos.
    - Usuario y contraseña con privilegios suficientes para operar esa base de datos.
4. Lanzar el script install.php. Este script creará la estructura necesaria de tablas en su base de datos.
5. Lanzar la web desde cualquier navegador web. La aplicación estará ya lista para comenzar a recibir datos. 

Puede acceder al panel de administración mediante la URI <http://host/aplicacion/usuario>,
donde host es el nombre de dominio de su servidor y aplicacion es el directorio
donde ha desplegado el código de Celia360.

Para conocer la forma en la que puede comenzar a introducir datos en la aplicación,
remítase a la documentación de usuario disponible en la web oficial de la aplicación.