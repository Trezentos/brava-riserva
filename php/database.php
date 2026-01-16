<?php

/*
|--------------------------------------------------------------------------
| Set Tables Database
|--------------------------------------------------------------------------
|
| Here you can set the application tables
|
*/

$tables = [];

$tables['ACESSOS'] 		 	  	= PREFIX.'acessos';
$tables['PAGINAS'] 			  	= PREFIX.'paginas';
$tables['USUARIOS'] 		  	= PREFIX.'usuarios';
$tables['BANNERS']			  	= PREFIX.'banners';
$tables['CADASTRO']				= PREFIX.'cadastro';
$tables['CONFIG']			  	= PREFIX.'config';

$tables['GALERIA']				= PREFIX.'galeria';
$tables['GALERIA_IMG']			= PREFIX.'galeria_imagens';

$tables['EMPREENDIMENTOS_IMG']	= PREFIX.'empreendimentos_imagens';



/*
|--------------------------------------------------------------------------
| Database Connection
|--------------------------------------------------------------------------
|
| Here the connection to the database is initialized
|
*/

require PHP."ezsql/ez_sql_core.php";
require PHP."ezsql/ez_sql_mysqli.php";

$db = new ezSQL_mysqli(DB_USER,DB_PASS,DB_NAME,DB_HOST);
$db->query("SET NAMES 'utf8'");
$db->query('SET character_set_connection=utf8');
$db->query('SET character_set_client=utf8');
$db->query('SET character_set_results=utf8');