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

      //Relie le paramètre "1" de la requête SQL à la variable "$email", qui contient la valeur "T-shirt".
      $stmt->bindParam(1, $this->email);
  
      // Exécutez la requête
      $stmt->execute();
  
      // va chercher trouver et recuperer la données correspondantes $this->email pour etre mis dans une variable et en disposer 
      $user = $stmt->fetch();
  
      // test la condition Si un utilisateur a été trouvé dans le tableau et retourne  si c est vrai :cela signifie que l'adresse e-mail est déjà utilisée
      // ou si c est faux...et de passer ligne 37 de UserController
      if ($user) {
        return true;
      } else {
        return false;
      }
    }

   function checkPasswordCorrect(){
    $stmt = $this -> getConnect()->prepare('SELECT * FROM users WHERE password =?');
    $stmt->bindParam(1, $this->password);
    $stmt->execute();
    $user = $stmt->fetch();
    if ($user) {
           return true;
         } else {
           return false;
         }
       }


      function insertUser(){
      $stmt = $this -> getConnect() -> prepare('INSERT INTO users (email, username, password) VALUES (? ,?,?)');
  
      $stmt -> bindParam(1, $this -> email);
      $stmt -> bindParam(2, $this -> username);
      $stmt -> bindParam(3, $this -> password);
  
      $stmt -> execute();
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
    // public function getUserByEmailAndPassword($email, $password) {
    //   $stmt = $this->getConnect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
    //   $stmt->execute([$email, sha1($password)]);
    //   return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
  
    // function getUserByEmailAndPassword($email, $password){
    //   $userModel = new UserModel($this -> email,'', $this -> password);
    
    //   $userTab = $userModel -> fetch(); 
    //   var_dump($userTab);
    //   if(count($userTab) === 0){
    //     return false;
    //   }
      
    //   $this -> id = $userTab['id'];
    //   $this -> avatarURL = $userTab['avatar'];
    //   $this -> role = $userTab['role'];
  
    //   return true;
    // }
  }
   

   
    
   
      // function fetch() : array {
      //   $stmt = $this -> getConnect() -> prepare('SELECT * FROM users WHERE email=?');
    
      //   $stmt -> bindParam(1, $this ->email);
    
      //   $res = $stmt -> execute();
        
      //   $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
    
      //   if(is_bool($userFromDB)){
      //     return [];
      //   }
        
      //   return $userFromDB;
      // }

      // static function fetchByID($id){
      //   $connect = DB::getConnection();
    
      //   $stmt = $connect -> getConnect() -> prepare('SELECT * FROM users WHERE id=?');
    
      //   $stmt -> bindParam(1, $id);
      //   $res = $stmt ->execute();
      //   $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
      //   return $userFromDB;
      // }

  
  
  
