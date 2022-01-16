<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Articles</title>
</head>

<body>
	<?php 
	require("../config.php");
	$mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = "SELECT * FROM articles";
	$result = $mydb->prepare($query);
	$result->execute();
	$articles = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach($articles as $tableaux){
		echo '<article>';
		echo '<h2>'.$tableaux['title'].'</h2>';
		echo '<p>'.$tableaux['content'].'</p>';
		?>
		<a href="edit.php?id=<?php echo $tableaux['idArticle'] ?>"><input type="submit" name="edit" value="Editer l'article"></a>
		<a href="delete.php?id=<?php echo $tableaux['idArticle'] ?>"><input type="submit" name="delete" value="Supprimer l'article"></a>
		<?php
		echo '</article>';
	}
	?>
</body>
</html>