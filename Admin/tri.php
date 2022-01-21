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
    <title>Tri</title>
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
	<?php
		require '../config.php';
		include '../adminHeader.php';
	?>
	<div class="mybutton">
		<a href="tri.php?test=2" class='btn btn-primary'>Tri par sexe</a>
		<a href="tri.php?test=3" class='btn btn-primary'>Tri par série</a>
	</div>

	<section class="inscrits">
	<div class="container">
	<?php
	if (isset($_GET['test'])) {
		# code...

	if ($_GET['test']==1)
	{
	  $result = $mydb->query("SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile");
	  echo "<h2>LISTE DES CANDIDATURES</h2>";
	}

	elseif($_GET['test']==2)
	{
	  $result = $mydb->query("SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile order by e.sexe");
	  echo "<h2>LISTE DES CANDIDATURES</h2>";
	}
	elseif ($_GET['text']=3) {
		$result = $mydb->query("SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile order by e.serie");
	  echo "<h2>LISTE DES CANDIDATURES</h2>";
	}
	}
	$infos = $result->fetchAll();
	?>
	 <table width="100%" border="1">
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee BAC</th>
			<th>Diplome/Attestaion</th>
		</tr>
		<?php
		foreach($infos as $tableaux){
			$valeurs = $tableaux['chemin'];
			$nom = basename($valeurs);
			?><tr><?php 
			echo '<td>'.$tableaux['nom'].'</td>';
			echo '<td>'.$tableaux['prenom'].'</td>';
			echo '<td>'.$tableaux['sexe'].'</td>';
			echo '<td>'.$tableaux['dateNaiss'].'</td>';
			echo '<td>'.$tableaux['nationalite'].'</td>';
			echo '<td>'.$tableaux['serie'].'</td>';
			echo '<td>'.$tableaux['annee_bac'].'</td>';
			echo '<td>'."<a href='..$valeurs'download>$nom</a>".'</td>';
		?>
		</tr>
		<?php }
		?>
		</table>
	</div>
	</section>
	<?php 
	 include '../footer2.php'
	?>
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