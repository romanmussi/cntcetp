cntcetp
=======

Catálogo Nacional de Títulos y Certificados de Educación Técnico Profesional

=========================================================================================================
TECNOLOGIAS UTILIZADAS
=========================================================================================================
CakePHP Framework v.1.2
Base de datos PostgreSQL

=========================================================================================================
REQUERIMIENTOS
=========================================================================================================
HTTP Server. Apache con mod_rewrite activado
PHP 4.3.2 o mayor

=========================================================================================================
ENCODINGS
=========================================================================================================
Tanto los archivos como la base de datos tienen encoding ISO-8859-1 (LATIN1)

=========================================================================================================
INSTALACION
=========================================================================================================
1. Hacer checkout del trunk.
2. Crear base de datos en PostgreSQL utlizando "/config/sql/catalogo_schema.sql".
3. Crear en directorio app/config/ archivo database.php con configuración de conexión 
a base de datos y config.email.php con configuración de servidor de email (tomar como base config.email.php.default).
[Para más información dirigirse a http://book.cakephp.org/view/922/Database-Configuration]
4. Dar permisos de escritura a los siguientes directorios: 
	/app/tmp/
	/app/webroot/css
	/app/webroot/js

=========================================================================================================
MIGRACIÓN DE DATOS DESDE REGISTRO A CATÁLOGO
=========================================================================================================

Esta página funciona con datos de la base de datos del registro nacional. Para migrar estos datos con el fin
de tener la base de datos de Catálogo completa y correcta se precisará tener la base de datos de Registro 
completa y la de Catálogo creada y vacía, luego correr el script "/config/sql/database_cleanup.sql"
