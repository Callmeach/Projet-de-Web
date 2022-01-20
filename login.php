<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>

<body>
	<?php 
	require 'config.php';
	session_start();
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		
		$query = "SELECT * FROM admin WHERE username = '$username' and password = '$password' limit 1";
		$result = $mydb->prepare($query);
		$result->execute();
		$return = $result->fetchAll();
		if(count($return) > 0){
			$_SESSION['username'] = $username;
			header("location: Admin/index.php");
		}
		else{
			$message = "Le nom d'utlisateur ou le mot de passe est incorrect";
		}
	}
	?>
	<form class="box" action="" method="post" name="login">
		<h1 class="box-logo box-title"><a href="#">Espace Admin</a></h1>
		<h1 class="box-title">Connexion</h1>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
		<input type="password" class="box-input" name="password" placeholder="Mot de passe">
		<input type="submit" class="box-button" name="sublit" value="Connexion">
		<p class="box-register">Vous n'etes pas administrateur de ce site?<a href="index.html">Quitter</a></p>
		<?php
		if(!empty($message)){ ?>
			<p class="errorMessage"><?php echo $message; ?></p>
		<?php } ?>
	</form>
</body>
</html>