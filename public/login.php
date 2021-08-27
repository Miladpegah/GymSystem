<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
  $username = "";

  if (isset($_POST['submit'])) {
      // Process the form
      // validations
      $required_fields = array("username", "password");
      validate_presences($required_fields);

      if (empty($errors)) {
          // Attempt Login
          $username = $_POST["username"];
          $password = $_POST["password"];
          // finds the admin type
          $type_set = find_admin_username($username);
          $type = mysqli_fetch_assoc($type_set);

          $found_admin = attempt_login($username, $type["type"], $password);

          if ($found_admin) {
              // Success
              // Mark user as logged in
              // Create 3 session to use later
              $_SESSION["admin_id"] = $found_admin["id"];
              $_SESSION["username"] = $found_admin["username"];
              $_SESSION["type"] = $found_admin["type"];

              if ($type["type"] === "Receptionist") {
                  redirect_to("admin.php");
              } elseif ($type["type"] === "Trainer") {
                  redirect_to("trainer.php");
              }
          } else {
              // Failure
              $_SESSION["message"] = "incorrect Username, Password!";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php include "../includes/layouts/navigation.php"; ?>
<div id="main">
    <div id="navigation"> <br />
        <a href="signin.php">Sign in</a> <br />
        <a href="signup.php">Sign up</a> <br />
        <hr />
        <b><a href="login">Staff Login</a></b>
    </div>
    <div id="page"  class="animated fadeIn"><?php echo message(); ?> <?php echo form_errors($errors); ?>
        <div style="text-align: center;">
            <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #F90; border-radius: 5px; box-shadow: 0px 0px 8px #F90; margin: 50px auto auto;">
                <div style="background: #F90; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; font-size: 1.00em; font-weight:bold;">Staff Login</span></div>
                <div style="padding: 15px">
                    <style type="text/css" scoped>
                        td { text-align:left; font-family: verdana,arial; color: #000000; font-size: 1.00em; font-weight: normal; }
                        input { border: 1px solid #CCCCCC; border-radius: 5px; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
                        input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #F90; float: right; margin-top: 10px; }
                        table.center { margin-left:auto; margin-right:auto; }
                    </style>
                    <form action="login.php" method="POST" name="login" onsubmit="return validateLogin();">
                        <table class='center'>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" value="<?php echo htmlentities($username); ?>"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" value=""></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="submit" value="Submit"></td>
                            </tr>
                            <tr>
                                <td colspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan=2></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
