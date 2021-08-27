<?php
  if (!isset($layout_context)) {
      $layout_context = "public";
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="user-scalable=yes, width=760" />
        <link rel="stylesheet" type="text/css" href="../public/stylesheets/animate.css">
        <link rel="stylesheet" type="text/css" href="../public/stylesheets/public.css">
        <link rel="icon" type="image/png" href="../public/images/favicon.png" />
        
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>Armstrong Gym
            <?php
              if ($layout_context == "admin") {
                  echo "Admin";
              }
            ?>
        </title>
    </head>
    <body>
        <div id="header">
            <h1>
                <a href="index.php">
                    <img src="../public/images/final-white-logo.png" width="100" height="120" alt="Logo"/>
                    <b>Armstrong Gym</b>
                    <?php
                      if ($layout_context == "admin") {
                          echo "Admin";
                      }
                    ?>
                </a>
            </h1>
        </div>
