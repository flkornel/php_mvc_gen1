<?php

class Page extends DBHandler{

//////////////////// user methods //////////////////////////

  // gets all users from the db
  // no need for prepared statement since no user input is given
  protected function getUsers(){
    $sql = "SELECT user_id, user_name FROM users ORDER BY user_id ASC";
    $stmt = $this->connect()->query($sql);
    // returns data as is
    return $stmt->fetchAll();
  }

  // gets username for give user id
  // prepared, since user has input the id
  protected function getUserName($userId){

    // want to be sure to only get one or none rows
    $sql = 'SELECT user_name FROM users WHERE user_id = ? LIMIT 1';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userId]);
    $userNameOut = $stmt->fetch();

    // I don't like if statements
    // returns ONLY the username field unless its NULL
    return ($userNameOut != NULL) ? $userNameOut['user_name'] : NULL;
  }

  // creates a users
  // could be useful later
  // returns false if user already exists
  protected function setUser($userName){
    $sql = 'INSERT INTO users(user_name) VALUES ("?")';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$userName]);
  }

//////////////// ad methods //////////////////////////////////

  protected function getAds(){
    $sql = "SELECT ad_id, ad_title, ad_user, user_name FROM advertisements INNER JOIN users ON ad_user = user_id";
    $stmt = $this->connect()->query($sql);
    return $stmt->fetchAll();
  }

  protected function getAdsFromUser($userId){
    $sql = 'SELECT ad_id, ad_title FROM advertisements WHERE ad_user= ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
  }

}
