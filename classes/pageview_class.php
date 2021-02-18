<?php

// TODO:
// Make table-creating function (makeTable)
// Input data is array of SQL query
// Get header data from first row i.e. data[0][x-y]
// Get Table class, Table id, Row class from array, null means no classes
// handle no data (maybe echo out "no data to show"?)


class PageView extends Page{

////////////////////// User methods //////////////////////////

  // echoes out username from id
  // Could be useful in the future
  public function getName($userId){
    return ($this->getUserName($userId) != NULL) ? $this->getUserName($userId) : "No such user";
  }

  public function getUsersTable(){

    // gets data from modell
    $users = $this->getUsers();

    // starting tags and headers
    $userTable = "<table>";
    $userTable .= "<tr>";
    $userTable .= "<th>User ID</th>";
    $userTable .= "<th>Username</th>";
    $userTable .= "</tr>";

    // actual data
    // link to only users' profile
    foreach ($users as $userRow) {
      $userTable .= "<tr>";
      $userTable .= "<td>".$userRow['user_id']."</td>";
      $userTable .= '<td><a href="/users/'.$userRow['user_id'].'">'.$userRow['user_name']."</a></td>";
      $userTable .= "</tr>";
    }

    // closing tag and echo
    $userTable .= "</table>";
    echo $userTable;
  }

////////////////////// Ad methods ////////////////////////////

  // echoes out a table with all the ads
  // username is link to the users' ads
  public function getAllAds(){

    // gets data from modell
    $ads = $this->getAds();

    // starting tags and headers
    $adTable = "<table>";
    $adTable .= "<tr>";
    $adTable .= "<th>Adv. ID</th>";
    $adTable .= "<th>Adv. Title</th>";
    $adTable .= "<th>Adv. User</th>";
    $adTable .= "</tr>";

    // content
    foreach ($ads as $adRow) {
      $adTable .= "<tr>";
      $adTable .= "<td>".$adRow['ad_id']."</td>";
      $adTable .= "<td>".$adRow['ad_title']."</td>";
      $adTable .= '<td><a href="/users/'.$adRow['ad_user'].'">'.$adRow['user_name']."</a></td>";
      $adTable .= "</tr>";
    }

    // closing tags and echo
    $adTable .= "</table>";
    echo $adTable;
  }

  // echoes out ads from a specific user
  public function getAdsFromUserId($userId){

    // gets data from modell
    $ads = $this->getAdsFromUser($userId);

    // starting tags and headers
    $adTable = "<table>";
    $adTable .= "<tr>";
    $adTable .= "<th>Adv. ID</th>";
    $adTable .= "<th>Adv. Title</th>";
    $adTable .= "</tr>";

    // actual data
    foreach ($ads as $adRow) {
      $adTable .= "<tr>";
      $adTable .= "<td>".$adRow['ad_id']."</td>";
      $adTable .= "<td>".$adRow['ad_title']."</td>";
      $adTable .= "</tr>";
    }

    // closing tag and echo
    $adTable .= "</table>";
    echo $adTable;
  }

}
