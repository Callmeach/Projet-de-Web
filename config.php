<?php
//Connexion a la base de donnees
try{
	$mydb = new PDO("mysql:host=localhost;dbname=projetwebv1","root","");
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
?>