# CELIA360 - NOTAS DE INSTALACIÓN

Celia360 debe desplegarse en servidor como cualquier otra aplicación web.

El procedimiento general es:

1. Mover todo el código fuente a un directorio del servidor accesible vía web.
2. Crear una base de datos MySQL o MariaDB vacía.
4. Lanzar el script http://host/aplicacion/install en cualquier navegador web, donde host es el nombre de dominio de su servidor y aplicacion es el directorio donde ha desplegado el código fuente. Siga las instrucciones de este pequeño programa para completar la instalación. Este script creará la estructura necesaria de tablas en su base de datos así como un archivo de configuración. Por una enorme cantidad de posibles razones que dependen de la configuración de su servidor, la creación de este archivo fallará. En tal caso, el programa de instalación le informará de este error y tendrá que crear manualmente el archivo de configuración en el directorio raíz de su aplicación.
Esto se puede hacer a partir del archivo de ejemplo que se suministra con la distribución, llamado [`.env.example`](.env.example). Tendrá que copiar y renombrar ese archivo de ejemplo, y luego editarlo. El nombre  del archivo dependerá del entorno donde se esté ejecutando la aplicación. Los nombres posibles son:

    - `.env.development`
    - `.env.production`
    - `.env.testing`

    Tendrá que especificar:
    - Host de la base de datos.  
    - Nombre de la base de datos.
    - Usuario y contraseña con privilegios suficientes para operar esa base de datos.
    - URL base de la instalación (algo el tipo: http://host/aplicacion, donde host es el nombre de dominio de su servidor y aplicación es el directorio donde ha desplegado el código de Celia360)
    - Directorio donde escribir datos de la sesión. En la mayoría de los servidores servirá /tmp. Si no funciona, puede probar a crear un subdirectorio dentro de su directorio de usuario e indicar la ruta absoluta aquí. El directorio debe tener permisos de escritura. Consulte con su administrador de sistemas si tiene alguna duda.

5. Lanzar la web desde cualquier navegador web. La aplicación estará ya lista para comenzar a recibir datos. 

Puede acceder al panel de administración mediante la URI <http://host/aplicacion/usuario>,
donde host es el nombre de dominio de su servidor y aplicacion es el directorio
donde ha desplegado el código de Celia360.

Para conocer la forma en la que puede comenzar a introducir datos en la aplicación,
remítase a la documentación de usuario disponible en el directorio /guia_usuario de su instalación.