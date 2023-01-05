<?php
//session_start();
include_once "../models/userModel.php";
// Classe UserController
class UserController {
  // Propriétés de la classe
  private $email;
  private $username;
  private $password;
  private $id;

  private $userModel;

  


  // Constructeur de la classe
  public function __construct($email, $username, $password) {
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    $this->userModel = new UserModel($email, $username, $password); // Création d'un objet UserModel
  }

  // Méthode pour inscrire un utilisateur
  public function signup() {
    // Vérification de l'adresse email
    if ($this->userModel->checkEmailExists()) {
      // Si l'adresse email est déjà utilisée, renvoyer une erreur à l'utilisateur
      return "L'adresse email est déjà utilisée par un autre compte.";
    }

    // Si l'adresse email est valide, insérer les données de l'utilisateur dans la table "users" de la base de données "postapp"
    $this->userModel->insertUser();

    return "Inscription réussie.";
  }

function signin($email, $password) {
  // Récupérer l'utilisateur depuis la base de données
  $zidane = $this->userModel->getUserByEmailAndPassword($this->email, $this->password);
  
  var_dump($zidane);

  return true;
}

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Get the value of username
   */ 
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  function isEmailValid() : bool{
    // trouver un moyen pour tester si une sous chaine est dans une chaine
    return filter_var($this -> email, FILTER_VALIDATE_EMAIL);
  }



  function isDataValid() : bool{
    return $this -> isEmailValid();
  }

  function getErrors(){
    //email pas valid et password valid: emailError=InputInvalid
    //email valid et password pas valid: passwordError=InputInvalid
    //email pas valid et password pas valid: emailError=InputInvalid&passwordError=InputInvalid
    $errors = [];
    !$this ->isEmailValid() ? array_push($errors, "emailError=InputInvalid") : null;
    
    // ['emailError=InputInvalid'] -> 'emailError=InputInvalid'
    // ['passwordError=InputInvalid'] -> 'passwordError=InputInvalid'
    // ['emailError=InputInvalid', 'passwordError=InputInvalid'] -> 'emailError=InputInvalid&passwordError=InputInvalid'
    return join("&", $errors);
  }

  function exist(){
    $userModel = new UserModel($this -> email,'', $this -> password);
    
    $userTab = $userModel -> fetch(); 
    // var_dump($userTab);
    if(count($userTab) === 0){
      return false;
    }
    
    $this -> email= $userTab['email'];
    $this -> username = $userTab['username'];


    return true;
  }
  function isPasswordCorrect(){
    $userFromDB = $this -> userModel -> fetch();

    return $userFromDB['password'] === $this -> password;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }
  }

 
