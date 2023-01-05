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
  }else{
    $user->signin($email, $password);
    // header("location: /profil.php");
  }

  //Verifier si l'utilisateur existe
if(!$user -> exist()){
    header("Location: /login.php?connexion=error&emailError=EmailDoesntExist" );
    die();
  }

  //2. Tester si le mot de passe recu est le meme que celui la DB return true sinon false.

if(!$user -> isPasswordCorrect()){
    header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect" );
    die();
  }

  //aller chercher le user depuis la DB




$_SESSION['email'] = $user ->getEmail();

$_SESSION["id"] = $user -> getId();

// header("Location: /profil.php");

?>