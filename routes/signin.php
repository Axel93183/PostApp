<?php 
session_start();
var_dump($_POST);

include_once "../controllers/UserController.php";

$email = $_POST['email'];
$password = $_POST['password'];

$userController = new UserController($email,'', $password);

$resultConnect = $userController -> signin();

header('Location: /profil.php'); 


?>
<!-- <p>Nom de l'utilisateur : <?php echo $_SESSION['user_userName']?></p>
<p>Avatar de l'utilisateur 'image' : <?php echo $_SESSION['user_avatar']?></p>
<p>Couverture de l'utilisateur 'image' : <?php echo $_SESSION['user_cover']?></p> -->


