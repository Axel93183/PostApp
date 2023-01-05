<?php 
session_start();
$connexionEmailError = "";
$connexionPasswordError = "";

if(isset($_GET['connexion'])){
  if(isset($_GET['emailError'])){
    $connexionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "Email n'existe pas!";
  }

  if(isset($_GET['passwordError'])){
    $connexionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Mot de passe trop court" : "Mauvais mot de passe!";
  }
}
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

<p><?= isset($_GET['result']) ? $_GET['result'] : '' ?></p>
</div>

<div>
<h1>Connexion</h1>
<form method="post" action="./routes/signin.php">
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <p>
    <?= $connexionEmailError ?>
  </p><br>
  <label for="password">Mot de passe:</label><br>
  <input type="password" id="password" name="password"><br>
  <p>
    <?= $connexionPasswordError ?>
  </p><br>
  <input type="submit" value="Se connecter">

</div>


<br><br><br><br><br>
</body>
</html>