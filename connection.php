<?php
$dbname="cmspro";	
$server="Localhost";
$user= "root";
$pass ="";
try
{	
$conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo "Connected";

}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>