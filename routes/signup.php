<?php 

include_once "./controllers/userController.php";



// Récupération des données du formulaire
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Création de l'objet UserController
$userController = new UserController($email, $username, $password);

// Inscription de l'utilisateur
$result = $userController->signup();

// Affichage du résultat de l'inscription
echo $result;






?>