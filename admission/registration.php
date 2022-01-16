<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inscription au concours d'entree a l'IAI-TOGO</title>
</head>

<body>
	<form class="box" action="../registration_data.php" method="post" enctype="multipart/form-data">
		<h1 class="box-logo box-title"><a href="#">Veuillez remplir les informations suivantes</a></h1>
		<input type="text" class="box-input" name="name" placeholder="Nom" required>
		<input type="text" class="box-input" name="firstname" placeholder="Prenom" required>
		Sexe : M<input type="radio" name="sexe" value="M" required>F<input type="radio" name="sexe" value="F">
		Date de naissance : <input type="date" name="birthday" max="2010-01-01" required>
		Nationalite : <input type="text" name="nationality" required>
		Serie : <select name="serie">
					<option>A</option>
					<option>C</option>
					<option>D</option>
					<option>F</option>
					<option>G</option>
				</select>
		Annee d'obtention BAC : <input type= "text" name="bac" required>
		Attestation ou Diplome du BAC <input type="file" name="diplome" id="file" required>
		<input type="submit" value="submit">		
	</form>
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
</body>
</html>