<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
  $username = ""; 

  if (isset($_POST['submit'])) { 
      // Process the form
      // validations for username and password MUST be filled out
      $required_fields = array("username", "password");
      validate_presences($required_fields);

      if (empty($errors)) { 
          // Attempt Login
          $username = $_POST["username"]; 
          $password = $_POST["password"]; 
          $found_user = attempt_signin($username, $password); 
          if ($found_user) { 
              // Success
              // Mark user as logged in
              // Create 2 session to use later
              $_SESSION["id"] = $found_user["id"];
              $_SESSION["username"] = $found_user["username"];
              redirect_to("user_content.php");
          } else {
              // Failure
              $_SESSION["message"] = "Username or password not found!";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php include("../includes/layouts/header.php"); ?>
<?php include "../includes/layouts/navigation.php"; ?>
<div id="main">
    <div id="navigation"> <br />
        <b><a href="signin.php">Sign in</a></b><br />
        <a href="signup.php">Sign up</a><br />
        <hr />
        <a href="login.php">Staff Login</a>
    </div>
    <div id="page" class="animated fadeIn">
        <?php echo message(); ?> <?php echo form_errors($errors); ?>
        <div style="text-align: center;">
            <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #F90; border-radius: 5px; box-shadow: 0px 0px 8px #F90; margin: 50px auto auto;">
                <div style="background: #F90; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; font-size: 1.00em; font-weight:bold;">Members Login</span></div>
                <div style="padding: 15px">
                    <style type="text/css" scoped>
                        td { text-align:left; font-family: verdana,arial; color: #000000; font-size: 1.00em; font-weight: normal;}
                        input { border: 1px solid #CCCCCC; border-radius: 5px; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
                        input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #F90; float: right; margin-top: 10px; }
                        table.center { margin-left:auto; margin-right:auto; }
                    </style>
                    <form method="POST" action="signin.php" name="signin" onsubmit="return validateSignIn();">
                        <table class='center'>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" value="<?php echo htmlentities($username); ?>"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" value="" ></td>
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
            <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #F90; border-radius: 5px; box-shadow: 0px 0px 8px #F90; margin: 50px auto auto;">
                <div style="background: #F90; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; font-size: 1.00em; font-weight:bold;">New Member</span></div>
                <div style="padding: 15px">
                    <style type="text/css" scoped>
                        td { text-align:left; font-family: verdana,arial; color: #000000; font-size: 1.00em; }
                        input { border: 1px solid #CCCCCC; border-radius: 5px; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
                        input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #F90; float: right; margin-top: 10px; }
                        table.center { margin-left:auto; margin-right:auto;  max-width: 300px;}
                    </style>
                    <table class='center'>
                        <tr>
                            <td colspan="2">If you are a new member and you don't have any login details sign up online today to get your 10% discount and pay to the receptionist in your first session. <br />Click continue to continue.</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="button" name="submit" value="Continue" onclick="window.location.href = 'signup.php';"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
