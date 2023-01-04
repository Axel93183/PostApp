<?php

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
    $this->userModel = new UserModel(); // Création d'un objet UserModel
  }

  // Méthode pour inscrire un utilisateur
  public function signup() {
    // Vérification de l'adresse email
    if ($this->userModel->checkEmailExists($this->email)) {
      // Si l'adresse email est déjà utilisée, renvoyer une erreur à l'utilisateur
      return "L'adresse email est déjà utilisée par un autre compte.";
    }

    // Si l'adresse email est valide, insérer les données de l'utilisateur dans la table "users" de la base de données "postapp"
    $this->userModel->insertUser($this->email, $this->username, $this->password);

    return "Inscription réussie.";
  }
}