<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location: ../login.php");
	exit();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/IAI.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
	
	<?php include '../adminHeader.php' ?>
	
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
	
	<?php include '../footer2.php' ?>
	<!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>