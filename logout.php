<?php 
//Initialiser une session
session_start();

//Detruire la session
if(session_destroy()){
	//Redirection vers la page de connexion
	header("location: index.html");
}
?>