<?php
$db_host="localhost"; 
$db_user="WRITE_USER";	
$db_password="WRITE_PASSWORD";	
$db_name="shopping_cart_db (WRITE_DATABASE)";	

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



