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
    <title>Tri et Filtre</title>
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
	<section id="Sexe">
		<?php
		include '../adminHeader.php';
		require('../config.php');
	
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.sexe = :sexe";
		$result = $mydb->prepare($query);
		$result->execute(['sexe' => 'M']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		?>
		<table width="75%" border="1">
		<caption><h2>Masculin</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
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
		<p></p>
		<table width="75%" border="1">
		<caption><h2>Feminin</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$result->execute(['sexe' => 'F']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		foreach($infos as $tableaux){
			$valeurs = $tableaux['chemin'];
			$nom = basename($valeurs);
			?><tr>
			<?php
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
	</section>
	<br>
	<br>
	<br>
	<br>
	<br>
	<section id="Serie">
		<table width="75%" border="1">
		<caption><h2>C</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'C']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		
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
		
		<table width="75%" border="1">
		<caption><h2>D</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'D']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
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
		
		<table width="75%" border="1">
		<caption><h2>A</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'A']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
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
		
		<table width="75%" border="1">
		<caption><h2>E</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'E']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		
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
		
		<table width="75%" border="1">
		<caption><h2>F</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'F']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		
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
		
		<table width="75%" border="1">
		<caption><h2>G</h2></caption>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sexe</th>
			<th>Date de Naissance</th>
			<th>Nationalité</th>
			<th>Serie</th>
			<th>Annee d'obtention BAC</th>
			<th>Diplome ou Attestaion</th>
		</tr>
		<?php
		$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile AND e.serie = :serie";
		$result = $mydb->prepare($query);
		$result->execute(['serie' => 'G']);
		$infos = $result->fetchAll(PDO::FETCH_ASSOC);
		
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
	</section>
	<?php include '../footer2.php'?>
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