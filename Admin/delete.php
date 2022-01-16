<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Suppression</title>
</head>

<body>
	<p>La suppression est definitive! Voulez-vous continuer?</p>
	<form action="suppr.php" method="post">
		<input type="hidden" name="id" placeholder="Titre de l'article" value="<?php echo $_GET['id'] ?>">
		<div><input type="submit" value="Supprimer"></div>
	</form>
	<a href="articles.php">Annuler</a>
</body>
</html>