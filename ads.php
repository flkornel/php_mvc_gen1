<?php
include 'includes/autoloader.php';
?><!DOCTYPE html>
<html>
  <head>
    <title>Ads</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
  </head>

  <body>
    <div id="wrapper">
      <h1>Advertisements</h1>
      <?php

      $pView = new PageView();

      $pView->getAllAds();

      ?>
      <div id="linkWrapper">
        <a href="/">Back to Homepage</a>
        <a href="/users">List of users</a>
      </div>
    </div>
  </body>

</html>
