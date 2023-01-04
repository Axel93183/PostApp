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



</body>
</html>