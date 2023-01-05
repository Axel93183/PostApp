<?php session_start();
include_once "../models/userModel.php";
include_once "../controllers/userController.php";
$email = $_POST['email'];
$password = $_POST['password'];

// Instanciation du contrôleur utilisateur
if(!(isset($_POST['email'], $_POST['password']))){
    header("Location: /login.php");
    die();
  }
  
  $user = new UserController($_POST['email'],'', $_POST['password']);

if(!($user -> isDataValid())){
    header("Location: /login.php?connexion=error&" . $user -> getErrors());
    die();
  }

  //Verifier si l'utilisateur existe
if(!$user -> exist()){
    header("Location: /login.php?connexion=error&emailError=EmailDosntExist" );
    die();
  }

  //2. Tester si le mot de passe recu est le meme que celui la DB return true sinon false.

if(!$user -> isPasswordCorrect()){
    header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect" );
    die();
  }
  
$_SESSION['email'] = $user ->getEmail();
$_SESSION['username'] = $user -> getUsername();
$_SESSION['password'] = $user -> getPassword();

header("Location: /profil.php");

?>