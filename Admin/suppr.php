<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location: ../login.php");
	exit();
}
?>
<?php
require '../config.php';

if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$query = "DELETE FROM articles WHERE idArticle = :id";
	$result = $mydb->prepare($query);
	$result->execute(array('id' => $id));
	header('location:articles.php');
}
else{
	die('Informations manquantes');
}
?>