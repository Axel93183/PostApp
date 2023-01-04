<?php
//session_start();
include_once "../models/userModel.php";
// Classe UserController
class UserController {
  // Propriétés de la classe
  private $email;
  private $username;
  private $password;
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

  public function signin($email, $password) {
    // Récupération de l'utilisateur avec cet email et ce mot de passe
    $userModel = new UserModel($email,'', $password);
    $user = $userModel->getUserByEmailAndPassword($email, $password);

    if ($user) {
      // L'utilisateur a été trouvé, on stocke ses informations en session
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];

      // Redirection vers la page protégée
      header('Location: ./profil.php');
      exit;
    } else {
      // L'utilisateur n'a pas été trouvé, on affiche un message d'erreur
      echo 'Email ou mot de passe incorrect';
    }
  }
}