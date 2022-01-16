<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Candidatures</title>
</head>

<body>
	<h1>Liste des candidatures</h1>
	
	<?php 
	require('../config.php');
	
	$query = "SELECT e.nom,e.prenom,e.sexe,e.dateNaiss,e.nationalite,e.serie,e.annee_bac, f.chemin FROM etudiants e INNER JOIN files f WHERE e.idEtudiant = f.idfile";
	$result = $mydb->prepare($query);
	$result->execute();
	$infos = $result->fetchAll(PDO::FETCH_ASSOC);
	?>
	<table width="75%" border="1">
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
		<input type="button" value="Imprimer" onclick="window.print();">
	</table>
</body>
</html>