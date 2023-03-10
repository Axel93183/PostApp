<?php

// session_start();

class DB{
  private $connect;

  function __construct(){
    /* Connexion à une base MySQL avec l'invocation de pilote */
    $dsn = 'mysql:dbname=postapp;host=localhost';
    $user = 'root';
    $password = '';

    $this -> connect = new PDO($dsn, $user, $password);
  }
    

  /**
   * Get the value of connect
   */
  protected function getConnect()
  {
    return $this->connect;
  }

  static function getConnection(){
    return new self();
  }
}