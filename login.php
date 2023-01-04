<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
  $title="Connexion";
  include_once "./components/head.php";
?>
<body>
    
<?php 

include_once "./components/navbar.php"

?>
<div>
<h1>Inscription</h1>
<form action="./routes/signup.php" method="post">
  <label for="email">Adresse email:</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="username">Nom d'utilisateur:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Mot de passe:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Envoyer">
</form> 


<!-- peco c est comme un echo -->
<!-- <?php 
//echo $_GET['result']
?> -->

<p><?= $_GET['result'] ?></p>
</div>

<div>
<h1>Connexion</h1>
<form method="post" action="./routes/signin.php">
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <label for="password">Mot de passe:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Se connecter">
</form> 
</div>


<br><br><br><br><br>
</body>
</html>