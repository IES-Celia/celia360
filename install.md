# CELIA360 - NOTAS DE INSTALACIÓN

Celia360 debe desplegarse en servidor como cualquier otra aplicación web. Este proceso requiere de ciertos conocimientos técnicos. Si usted desconoce cómo realizar alguno de los siguientes pasos, póngase en contacto con su administrador de sistemas.

El procedimiento general es:

1. Mover todo el código fuente a un directorio del servidor accesible vía web. La forma más simple de hacer esto es clonar el repositorio de Github. Es posible que su panel de administración del servidor le permita clonar repositorios git. Si no fuera así, necesitará acceder a una sesión remota y ejecutar este comando:
    $ git clone https://github.com/IES-Celia/celia360
   Otra posibilidad es clonar el repositorio en su equipo local (necesitará instalar git en su ordenador) y luego subir el código fuente por ftp a su servidor.
2. Crear una base de datos MySQL o MariaDB vacía en su servidor.
3. Lanzar el script http://host/aplicacion/install.php en cualquier navegador web, donde host es el nombre de dominio de su servidor y aplicacion es el directorio donde ha desplegado el código fuente. Siga las instrucciones de este pequeño programa para completar la instalación. Este script creará la estructura necesaria de tablas en su base de datos así como un archivo de configuración. Por una enorme cantidad de posibles razones que dependen de la configuración de su servidor, la creación de este archivo puede fallar. En tal caso, el programa de instalación le informará de este error y tendrá que crear manualmente el archivo de configuración en el directorio raíz de su aplicación. Siga las instrucciones del programa de instalación para ello.
    En el archivo de configuración tendrá que especificar:
    - Host de la base de datos.  
    - Nombre de la base de datos.
    - Usuario y contraseña con privilegios suficientes para operar esa base de datos.
    - URL base de la instalación (algo el tipo: http://host/aplicacion, donde host es el nombre de dominio de su servidor y aplicación es el directorio donde ha desplegado el código de Celia360)
    - Directorio donde escribir datos de la sesión. En la mayoría de los servidores servirá /tmp. Si no funciona, puede probar a crear un subdirectorio dentro de su directorio de usuario e indicar la ruta absoluta aquí. El directorio debe tener permisos de escritura. Consulte con su administrador de sistemas si tiene alguna duda.

4. Elimine el script de instalación (install.php) de su servidor. Esto es muy importante hacerlo por motivos de seguridad.
5. Lanzar la web desde cualquier navegador web. La aplicación estará ya lista para comenzar a recibir datos. 

Puede acceder al panel de administración mediante la URI <http://host/aplicacion/usuario>,
donde host es el nombre de dominio de su servidor y aplicacion es el directorio
donde ha desplegado el código de Celia360.

Para conocer la forma en la que puede comenzar a introducir datos en la aplicación,
remítase a la documentación de usuario disponible en el directorio /docs de su instalación. Allí encontrará la documentación de usuario en formato markdown, html y pdf.