<?php
require '../config.php';

		$query = "SELECT * FROM articles where idArticle = :id";
		$result = $mydb->prepare($query);
		$result->execute(array('id' => $_GET['id']));
		
		$datas = $result->fetchAll();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edition</title>
</head>

<body>
	<form action="modify.php" method="post">
		<div>
			<?php foreach($datas as $values){ ?>
			<input type="hidden" name="id" placeholder="Titre de l'article" value="<?php echo $values['idArticle'] ?>"><?php } ?>
		</div>
		<div>
			<label for="title"></label>
			<input type="text" name="title" value="<?php echo $values['title'] ?>" required>
		</div>
		<div>
			<label for="text"></label>
			<textarea rows="20" cols="80" name="text" required>
			<?php echo $values['content'] ?>
			</textarea>
		</div>
		<div><input type="submit" value="Envoyer"></div>
	</form>
</body>
</html>