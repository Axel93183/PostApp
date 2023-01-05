<?php 
// session_start();
include_once "../models/DB.php";

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
    
      // Préparez la requête pour récupérer l'utilisateur avec l'adresse e-mail donnée
      $stmt = $this -> getConnect()->prepare('SELECT * FROM users WHERE email =?');
      $stmt->bindParam(1, $this->email);
  
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

    function insertUser(){
        $stmt = $this -> getConnect() -> prepare('INSERT INTO users (email, username,password) VALUES (? ,?,?)');
    
        $stmt -> bindParam(1, $this -> email);
        $stmt -> bindParam(2, $this -> username);
        $stmt -> bindParam(3, $this -> password);
    
        $stmt -> execute();
      }

      public function getUserByEmailAndPassword($email, $password) {
        $stmt = $this->getConnect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $stmt->execute([$email, sha1($password)]);
        return $stmt->fetch();
      }
    
      function fetch() : array {
        $stmt = $this -> getConnect() -> prepare('SELECT * FROM users WHERE email=?');
    
        $stmt -> bindParam(1, $this ->email);
    
        $res = $stmt -> execute();
        
        $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
    
        if(is_bool($userFromDB)){
          return [];
        }
        
        return $userFromDB;
      }
  }
  
  
  
  