 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/
// conexion Repuestos
$active_group = 'conexion_B';
$active_record = TRUE;

$db['conexion_B']['hostname'] = '192.168.0.21';
$db['conexion_B']['username'] = 'userutpl'; //root
$db['conexion_B']['password'] = 'J23xw-p29+';//vacio sin contrasena
$db['conexion_B']['database'] = 'activos';//bdmaterial activos
$db['conexion_B']['dbdriver'] = 'mysql';//mysql
$db['conexion_B']['dbprefix'] = '';
$db['conexion_B']['pconnect'] = TRUE;
$db['conexion_B']['db_debug'] = TRUE;
$db['conexion_B']['cache_on'] = FALSE;
$db['conexion_B']['cachedir'] = '';
$db['conexion_B']['char_set'] = 'utf8';
$db['conexion_B']['dbcollat'] = 'utf8_general_ci';
$db['conexion_B']['port']=3306;



$active_group = 'conexion_C';
$active_record = TRUE;

$db['conexion_C']['hostname'] = '192.168.0.21';
$db['conexion_C']['username'] = 'postgres';//postgres
$db['conexion_C']['password'] = 'adm936j967';
$db['conexion_C']['database'] = 'fulltime';//fulltime
$db['conexion_C']['dbdriver'] = 'postgre';
$db['conexion_C']['dbprefix'] = '';
$db['conexion_C']['pconnect'] = TRUE;
$db['conexion_C']['db_debug'] = TRUE;
$db['conexion_C']['cache_on'] = FALSE;
$db['conexion_C']['cachedir'] = '';
$db['conexion_C']['char_set'] = 'utf8';
$db['conexion_C']['dbcollat'] = 'utf8_general_ci';
$db['conexion_C']['swap_pre'] = '';
$db['conexion_C']['autoinit'] = TRUE;
$db['conexion_C']['stricton'] = FALSE;


$active_group = 'conexion_D';
$active_record = TRUE;

$db['conexion_D']['hostname'] = '192.168.0.21';
$db['conexion_D']['username'] = 'postgres';
$db['conexion_D']['password'] = 'adm936j967';
$db['conexion_D']['database'] = 'db_bienes';
$db['conexion_D']['dbdriver'] = 'postgre';
$db['conexion_D']['dbprefix'] = '';
$db['conexion_D']['pconnect'] = TRUE;
$db['conexion_D']['db_debug'] = TRUE;
$db['conexion_D']['cache_on'] = FALSE;
$db['conexion_D']['cachedir'] = '';
$db['conexion_D']['char_set'] = 'utf8';
$db['conexion_D']['dbcollat'] = 'utf8_general_ci';
$db['conexion_D']['swap_pre'] = '';
$db['conexion_D']['autoinit'] = TRUE;
$db['conexion_D']['stricton'] = FALSE;

$active_group = 'default';
$active_record = TRUE;
$db['default']['hostname'] = '192.168.0.21';
$db['default']['username'] = 'postgres';
$db['default']['password'] = 'adm936j967';
$db['default']['database'] = 'dbmovil';
$db['default']['dbdriver'] = 'postgre';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
$db['default']['port']=5432;

/* End of file database.php */
/* Location: ./application/config/database.php */
