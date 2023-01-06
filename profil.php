<?php 
session_start();

include_once "./components/navbar.php";


var_dump($_SESSION);



?>

<p>Nom de l'utilisateur : <?php echo $_SESSION['user_userName']?></p>
<p>Avatar de l'utilisateur 'image' : <?php echo $_SESSION['user_avatar']?></p>
<p>Couverture de l'utilisateur 'image' : <?php echo $_SESSION['user_cover']?></p>