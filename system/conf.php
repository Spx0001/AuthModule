<?php

/** USER ID **/
$host = "HOST_DB";
$user = "HOST_USER";
$pass = "HOST_PASS";
$db = "HOST_DB";


/** CONNECT PARAMS **/
$sql_connect = mysql_connect($host, $user, $pass);
$sql_dbselect = mysql_select_db($db, $sql_connect); 
@mysql_set_charset ("utf-8", $sql_dbselect);


/** ENCODING **/
mysql_query('SET NAMES UTF8');
?>

