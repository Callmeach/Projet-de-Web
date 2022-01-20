<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/IAI.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
	
	<?php include 'header3.php' ?>
	
<?php 
require 'config.php';

//Recuperons les donnees de l'utilisateur

$nom = $_POST['name'];
$prenom = $_POST['firstname'];
$sexe = $_POST['sexe'];
$birthday = $_POST['birthday'];
$nationality = $_POST['nationality'];
$serie = $_POST['serie'];
$dateBac = $_POST['bac'];


//Insertion des donnees dans la base de donnees

if(isset($nom, $prenom, $sexe, $birthday, $nationality, $serie, $dateBac)){
	
	$query = "INSERT INTO etudiants (nom,prenom,sexe,dateNaiss,nationalite,serie,annee_bac)
							 VALUES (:nom, :prenom, :sexe, :birthday, :nationality, :serie, :dateBac)";
	$result = $mydb->prepare($query);
	
}

//Tester si le fichier a bien ete envoye et s'il n'y a pas d'erreur

	if(isset($_FILES['diplome']) && $_FILES['diplome']['error'] == 0){
		//Verifier la taille du fichier
		if($_FILES['diplome']['size'] < 2000000){
			//Control de l'extension
			$fileInfo = pathinfo($_FILES['diplome']['name']);
			$extension = $fileInfo['extension'];
			$allowedextension = ['pdf'];
			if(in_array($extension,$allowedextension)){
				
				//Tester si le fichier existe deja dans le repertoire uploads
				$filename = file_exists('uploads/'.$_FILES['diplome']['name']) ? rand(1,1000).($_FILES['diplome']['name']) : $_FILES['diplome']['name'];
				
				//Valider le fichier et le stocker
				move_uploaded_file($_FILES['diplome']['tmp_name'], 'uploads/'.$filename);
				echo 'Inscription effectuee avec succes';
				
				//Enregistrer le chemin d'acces au fichier dans la base de donnees
				
				$requete = $mydb->prepare("INSERT INTO files (nom,chemin) VALUES (:nom, :chemin)");
				$chemin = "/uploads/".$filename;
				$requete->execute(array("nom"=>$_FILES['diplome']['name'], "chemin"=>$chemin));
			}
			else{
				echo 'Vous devez choisir un fichier pdf';
				exit();
			}
		}
		else{
			echo 'La taille du fichier est superieure a la limite autorisee';
			exit();
		}
	}
	else{
		echo 'Erreur lors du chargement du fichier';
		exit();
	}
$execution = $result->execute(array("nom" => $nom,"prenom" => $prenom,"sexe" => $sexe,"birthday" => $birthday,"nationality" => $nationality,"serie" => $serie,"dateBac" => $dateBac));
?>
	
	<?php include 'footer.php' ?>
	<!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>