<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion</title>
</head>

<body>
	<h2>Formulaire d'ajout d'une information sur le site</h2>
	<form method="post" action="">
		<div>
			<label for="title"></label>
			<input type="text" name="title" placeholder="Titre de l'article" required>
		</div>
		<div>
		<label for="text"></label>
		<textarea rows="20" cols="80" name="text" placeholder="Ecrivez votre article ici..." required></textarea>
		</div>
		<div><input type="submit" value="Envoyer"></div>
	</form>
	<?php
	require('../config.php');
	if(isset($_POST['title'],$_POST['text'])){
		$title = $_POST['title'];
		$text = $_POST['text'];
		$query = "INSERT INTO articles (title,content) VALUES (:title, :text)";
		$result = $mydb->prepare($query);
		$execution = $result->execute(array("title" => $title, "text" => $text));
		echo "<script>alert('Article ajouté avec succees')</script>";
	}
	?>
	<a href="articles.php">Aller a la page des articles</a>
</body>
</html>