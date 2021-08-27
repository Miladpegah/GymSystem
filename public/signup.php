<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already   ?>
<?php require_once("../includes/db_connection.php"); // connect to database    ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it   ?>
<?php require_once("../includes/validation_functions.php"); // validates any input we have   ?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      // validations for username and password MUST be filled
      $required_fields = array("username", "password");
      validate_presences($required_fields);
      // validations for username MUST be less than or equal to 30 character
      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) { // if there are no errors
          // Perform Create
          $username = mysql_prep($_POST["username"]); // get the username from input called username
          $hashed_password = password_encrypt($_POST["password"]); // get the password from input called password
          $firstname = mysql_prep($_POST["firstname"]); // get the firstname from input called firstname
          $lastname = mysql_prep($_POST["lastname"]); // get the lastname from input called lastname
          $gender = mysql_prep($_POST["gender"]); // get the gender from combobox called gender
          $dob = mysql_prep($_POST["dob"]); // get the date of birth from input date of birth username
          $address = mysql_prep($_POST["address"]); // get the address from input called address
          $city = mysql_prep($_POST["city"]); // get the city from input called city
          $postcode = mysql_prep($_POST["postcode"]); // get the postcode from input called postcode
          $email = mysql_prep($_POST["email"]);  // get the email from input called email
          $mobile = mysql_prep($_POST["mobile"]); // get the mobile from input called mobile
          // MySQL query
          $query = "INSERT INTO users (";
          $query .= "  username, hashed_password, firstname, lastname, gender, dob, address, city, postcode, email, mobile";
          $query .= ") VALUES (";
          $query .= "  '{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$gender}', '{$dob}', '{$address}', '{$city}', '{$postcode}', '{$email}', '{$mobile}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Registration compelete!";
              redirect_to("signin.php");
          } else {
              // Failure
              $_SESSION["message"] = "Registration failed! It might be because you chose duplicate USERNAME.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php include("../includes/layouts/header.php"); ?>
<?php include "../includes/layouts/navigation.php"; ?>
<style>
    #top_menu #membership  { color: white; }
</style>
<div id="main">
    <div id="navigation"> <br />
        <a href="signin.php">Sign in</a><br />
        <b><a href="signup.php">Sign up</a></b><br />
        <hr />
        <a href="login.php">Staff Login</a>
    </div>
    <div id="page"  class="animated fadeIn"><?php echo message(); ?><?php echo form_errors($errors); ?>
        <div style="text-align: center;">
		
			<div id="jsErrors" class="message animated fadeIn" style="display:none;"></div>
		
            <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #F90; border-radius: 5px; box-shadow: 0px 0px 8px #F90; margin: auto auto auto;">
                <div style="background: #F90; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; font-size: 1.00em; font-weight:bold;">Registration Form</span></div>
                <div style="padding: 15px">
                    <style type="text/css" scoped>
                        td { text-align:left; font-family: verdana,arial; color: #000000; font-size: 1.00em; font-weight: normal; }
                        input { border: 1px solid #CCCCCC; border-radius: 5px; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
                        input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #F90; float: right; margin-top: 10px; }
                        table.center { margin-left:auto; margin-right:auto; }
                        .error { font-family: verdana,arial; color: #000000; font-size: 1.00em; }
                    </style>

                    <form action="signup.php" method="POST" name="signup" onsubmit="return validateSignUp();">
                        <table class='center'>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" maxlength="30" value="" pattern="[A-Za-z0-9]+"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" value=""></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstname"></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastname"></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><select name="gender" style="width: 100%;">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Date Of Birth:</td>
                                <td><input type="date" name="dob" required value="YYYY-MM-DD"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address"></td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td><input type="text" name="city"></td>
                            </tr>
                            <tr>
                                <td>Post Code:</td>
                                <td><input type="text" name="postcode"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" name="email"></td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td><input type="tel" name="mobile"></td>
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
<body>
<?php include("../includes/layouts/footer.php"); ?>