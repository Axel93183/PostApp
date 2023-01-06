<?php

include_once "../models/UserModel.php";
// Classe UserController
class UserController extends UserModel {
  // Propriétés de la classe
  private $email;
  private $username;
  private $password;
  
  private $userModel;
  private $userConnect;

  


  // Constructeur de la classe
  public function __construct($email, $username, $password) {
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;

  // Création d'un objet UserModel pour relier les informations a la DB
  $this->userModel = new UserModel($email, $username, $password);
  $this->userConnect = new UserModel($email, '', $password);

  }

  // Méthode pour inscrire un utilisateur
  public function signup() {

    //tester si $_Post vide, retourner page login avec message error
    if (empty(($_POST)['email'])) {

      // Redirigez vers la page de login avec un message d'erreur
      header('Location: /login.php?errorInputEmpty=Veuillez+entrer+un+email');
      exit;
  }
    // Vérifier que l'adresse email existe dans la DB
    if ($this->userModel->checkEmailExists()) {

      // Si l'adresse email est déjà utilisée, renvoyer une erreur à l'utilisateur
      return "L'adresse email est déjà utilisée par un autre compte.";
    }

    // Si l'adresse email n'EXISTE pas , insérer les données de l'utilisateur dans la table "users" de la base de données "postapp"
    // L'objet $userModel appelle une methode de la classe dont il provient
      $this->userModel->insertUser();

      return "Inscription réussie.";
  }


    //Methode pour se connecter pour un utilisateur
    function signin(){

      //Test si input vide apres envoi de la requete (apres envoyer)
      if (empty(($_POST)['email'])){

        // Redirigez vers la page de login avec un message d'erreur
        header('Location: /login.php?error=Veuillez+entrer+votre+email');
        exit;}

      if ($this->userConnect->checkEmailExists() && $this->userConnect-> checkPasswordCorrect()) {
        
       //Créer une methode dans le model qui va récuperer le user (tableau associatif).
       $userConnect = new UserModel($this -> email,'', $this -> password);

       $userTab = $userConnect -> fetch();

       //Verifie si le tableau est bien recupérer
       var_dump($userTab);
       //Verifie si c est bien un tableau en comptant les elements du tableau 
       if(count($userTab) === 0){
        return false;
       }
        
        //Mettre les infos dans la session
        $_SESSION['user_id'] = $userTab['id'];
        $_SESSION['user_email'] = $userTab['email'];
        $_SESSION['user_userName'] = $userTab['userName'];
        $_SESSION['user_avatar'] = $userTab['avatar'];
        $_SESSION['user_cover'] = $userTab['cover'];
        
        return "l adresse mail se trouve bien dans la base de donnée";
      }

        return header('Location: /login.php?error=Email+ou+mot+de+passe+incorrect');
        exit;
      }
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

}


//==========================================================================================================================================================================
//BROUILLONS NE PAS REGARDER...POUR LE MOMENT LOL
//===========================================================================================================================================================================



   //    $user_data = array(
    //     'id' => '1',
    //     'email' => 'email@mail.com',
    //     'password' => '12345678',
    //     'userName' => 'Axel',
    //     'avatar' => 'default_avatar.png',
    //     'cover' => 'default_cover.png'
    // );
      //  $this -> id = $userTab['id'];
      //  $this -> avatarURL = $userTab['avatar'];
      //  $this -> role = $userTab['role'];


// $this->userConnect->getUserByEmailAndPassword($this->email,$this->password);
  // function isEmailValid() : bool{
  //   // trouver un moyen pour tester si une sous chaine est dans une chaine
  //   return filter_var($this -> email, FILTER_VALIDATE_EMAIL);
  // }



  // function isDataValid() : bool{
  //   return $this -> isEmailValid();
  // }

  // function getErrors(){
  //   //email pas valid et password valid: emailError=InputInvalid
  //   //email valid et password pas valid: passwordError=InputInvalid
  //   //email pas valid et password pas valid: emailError=InputInvalid&passwordError=InputInvalid
  //   $errors = [];
  //   !$this ->isEmailValid() ? array_push($errors, "emailError=InputInvalid") : null;
    
  //   // ['emailError=InputInvalid'] -> 'emailError=InputInvalid'
  //   // ['passwordError=InputInvalid'] -> 'passwordError=InputInvalid'
  //   // ['emailError=InputInvalid', 'passwordError=InputInvalid'] -> 'emailError=InputInvalid&passwordError=InputInvalid'
  //   return join("&", $errors);
  // }

  // function exist(){
  //   $userModel = new UserModel($this -> email,'', $this -> password);
    
  //   $userTab = $userModel -> fetch(); 
  //   // var_dump($userTab);
  //   if(count($userTab) === 0){
  //     return false;
  //   }
    
  //   $this -> email= $userTab['email'];
  //   $this -> username = $userTab['username'];


  //   return true;
  // }
  // function isPasswordCorrect(){
  //   $userFromDB = $this -> userModel -> fetch();

  //   return $userFromDB['password'] === $this -> password;
  // }


  

 
