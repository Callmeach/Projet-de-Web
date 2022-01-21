<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
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
	
	<?php include '../header2.php' ?>
	<div class="container">
	<form class="box" action="../registration_data.php" method="post" enctype="multipart/form-data">
		<h1 class="box-logo box-title"><a href="#">Veuillez remplir les informations suivantes</a></h1>
		<div class="col-6 mb-3">
			<label class="form-label">Nom</label>
			<input type="text" class="form-control" name="name" placeholder="Nom" required>
		</div>
		<div class="col-6 mb-3">
			<label class="form-label">Prenoms</label>
			<input type="text" class="form-control" name="firstname" placeholder="Prenom" required>
		</div>
		<div class="row mb-3">
		
		<label for="sexe" class="form-check-label">Sexe : </label>
		<div class="form-check col-1">
			<label class="form-check-label">M</label>
			<input class="form-check-input" type="radio" name="sexe" value="M" required>
		</div>
		<div class="form-check col-1">
			<label class="form-check-label">F</label>
			<input class="form-check-input" type="radio" name="sexe" value="F">
		</div>
		</div>
		<div class="col-6 mb-3">
			<label class="form-label">Date de naissance :</label>
			<input class="form-control" type="date" name="birthday" min="1990-01-01" max="2010-01-01" required>
		</div>
		<div class="col-6 mb-3">
			<label class="form-label">Nationalite :</label>
			<input class="form-control" type="text" name="nationality" required>
		</div>
		<div class="col-6 "><label class="form-label">Serie : </label></div>
		<div class="col-6">
			<select name="serie" class="form-control mb-3">
				<option>A</option>
				<option>C</option>
				<option>D</option>
				<option>F</option>
				<option>G</option>
			</select>
		</div>
		<div class="col-6 mb-3">
			<label class="form-label">Annee d'obtention BAC :</label>
			<input class="form-control" type= "number" name="bac" min="2010" max="2021" required>
		</div>
		<div class="col-6 mb-3">
			<label class="form-label">Attestation ou Diplome du BAC</label>
			<input class="form-control" type="file" name="diplome" id="file" required>
		</div>
		<div class="col-6 mb-3">
		<input class="btn btn-success" type="submit" value="Soumettre">
		</div>
	</form>
	</div>
	<script>
	document.forms[0].addEventListener('submit', function( evt ) {
    var file = document.getElementById('file').files[0];

    if(file && file.size < 2000000) {}
	else {
	evt.preventDefault();
	alert("La taille du fichier doit etre inferieur a 2 Mb");
	}
	}, false);
	</script>
	
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

    <!--Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>