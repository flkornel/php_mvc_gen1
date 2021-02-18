<?php
include 'includes/autoloader.php';
?><!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
  </head>

  <body>
    <div id="wrapper">
      <?php
      $pView = new PageView();

      // Prints username if user is selected
      if (isset($_GET["user_id"])){
        echo '<h1>Ads from '.$pView->getName($_GET["user_id"]).'</h1>';
      }else{
        echo '<h1>List of users</h1>';
      }

      // if no user is set echo all of the users
      // with links to the users' ads
      if (!isset($_GET["user_id"])){
        $pView->getUsersTable();
      }else{
        // if user is set, echo their ads
        $pView->getAdsFromUserId($_GET["user_id"]);
      }

      ?>
      <div id="linkWrapper">
        <a href="/">Back to Homepage</a>
        <?php
        $html = '<a href="/users">Back to all users</a>';
        echo (isset($_GET["user_id"])) ? $html : NULL;
        unset($html);
        ?>
        <a href="/ads">List of advertisements</a>
      </div>
    </div>
  </body>

</html>
