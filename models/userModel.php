<?php 

include_once "./models/DB.php";

class UserModel extends DB{
    private $email;
    private $username;
    private $password;

    public function __construct($email, $username, $password) {
        parent::__construct();
        $this -> email = $email;
        $this -> username = $username;
        $this -> password = $password;
    }
  
    public function checkEmailExists() {
      // Connexion à la base de données
      $db = new PDO('mysql:host=localhost;dbname=postapp', 'username', 'password');
  
      // Préparez la requête pour récupérer l'utilisateur avec l'adresse e-mail donnée
      $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
      $stmt->bindParam(':email', $this->email);
  
      // Exécutez la requête
      $stmt->execute();
  
      // Récupérez le premier utilisateur trouvé
      $user = $stmt->fetch();
  
      // Si un utilisateur a été trouvé, cela signifie que l'adresse e-mail est déjà utilisée
      if ($user) {
        return true;
      } else {
        return false;
      }
    }
  }
  
  
  
  