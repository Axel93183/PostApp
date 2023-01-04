<?php session_start();
include_once "../models/userModel.php";
include_once "../controllers/userController.php";
$email = $_POST['email'];
$password = $_POST['password'];

// Instanciation du contrôleur utilisateur
$userController = new UserController($email,'', $password);

// Appel de la méthode de connexion avec les données du formulaire
$userController->signin($_POST['email'], $_POST['password']);


?>