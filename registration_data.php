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
				//Valider le fichier et le stocker
				move_uploaded_file($_FILES['diplome']['tmp_name'], 'uploads/'.$rand().($_FILES['diplome']['name']));
				echo 'Le fichier a ete envoye avec succes.';
				
				//Enregistrer le chemin d'acces au fichier dans la base de donnees
				
				$requete = $mydb->prepare("INSERT INTO files (nom,chemin) VALUES (:nom, :chemin)");
				$chemin = "/uploads/".$_FILES['diplome']['name'];
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