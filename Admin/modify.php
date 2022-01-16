<?php
require '../config.php';

if(!isset($_POST['id'],$_POST['title'],$_POST['text'])){
	die('Informations manquantes');
}
else{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	
	$query = "UPDATE articles SET title = :title, content = :text WHERE idArticle = :id";
	$result = $mydb->prepare($query);
	$result->execute(array('title' => $title, 'text' => $text, 'id' => $id));
	echo "<script>alert('Article modifie avec succes')</script>";
}
?>
<a href="articles.php">Retourner a la liste des articles</a>