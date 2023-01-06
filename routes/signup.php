<?php 
// Relis le fichier UserController.php avec signup.php
include_once "../controllers/UserController.php";



// Récupère les données du formulaire et les mets dans des variables pour créer l'objet
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Création (instancie) de l'objet de la classe UserController pour permettre aux données  d'être utiliser par les méthodes de la classe UserController en les appelant
$userController = new UserController($email, $username, $password);

//Cette ligne permet l'inscription de l'utilisateur et ce, en appelant (utilisant) la methode signup() situé dans UserController. 
$result = $userController->signup();
 
//Redirige vers la page login.php avec ce que retourne la methode utilisé
header('Location: /login.php?result='.$result);










?>