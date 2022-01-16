<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualites</title>
</head>

<body>
	<h1>Liste Des Articles Publiés</h1>
	<?php 
	require 'config.php';
	$query = "SELECT * FROM articles";
	$result = $mydb->prepare($query);
	$result->execute();
	$articles = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach($articles as $tableaux){
		echo '<article>';
		echo '<h2>'.$tableaux['title'].'</h2>';
		echo '<p>'.$tableaux['content'].'</p>';
		echo '</article>';
	}
	?>
</body>
</html>