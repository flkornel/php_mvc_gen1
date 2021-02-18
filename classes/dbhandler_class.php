<?php

// Module parent class, the Control and View classes derive from this
// Only contains the most important things for connecting to the database
// All lower classes are extended from this
class DBHandler{
  private $host = "localhost";
  private $user = "rabitDB";
  private $pswd = "rabitpwd1234";
  private $db = "rabit";

  // This is handled by all sub-level modules/controllers.
  protected function connect(){
    $dest = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
    $pdo = new PDO($dest, $this->user, $this->pswd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

}
