<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form
      // validations
      $required_fields = array("username", "password");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) {
          // Perform Create

          $username = mysql_prep($_POST["username"]);
          $hashed_password = password_encrypt($_POST["password"]);
          $firstname = mysql_prep($_POST["firstname"]);
          $lastname = mysql_prep($_POST["lastname"]);
          $gender = mysql_prep($_POST["gender"]);
          $dob = mysql_prep($_POST["dob"]);
          $address = mysql_prep($_POST["address"]);
          $city = mysql_prep($_POST["city"]);
          $postcode = mysql_prep($_POST["postcode"]);
          $email = mysql_prep($_POST["email"]);
          $mobile = mysql_prep($_POST["mobile"]);

          $query = "INSERT INTO users (";
          $query .= "  username, hashed_password, firstname, lastname, gender, dob, address, city, postcode, email, mobile";
          $query .= ") VALUES (";
          $query .= "  '{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$gender}', '{$dob}', '{$address}', '{$city}', '{$postcode}', '{$email}', '{$mobile}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Member created.";
              redirect_to("manage_members.php");
          } else {
              // Failure
              $_SESSION["message"] = "Member creation failed! Maybe duplicate USERNAME! Please change it and try again.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <a href="manage_members.php">&laquo; Members</a><br />
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); ?>
        <h2>Create Admin</h2>
        <form action="new_member.php" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required value=""></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required value=""></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="firstname" required value=""></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lastname" required value=""></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><select name="gender" style="width: 11em;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select></td>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" value=""></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" value=""></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" value=""></td>
                </tr>
                <tr>
                    <td>Post Code:</td>
                    <td><input type="text" name="postcode" value=""></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value=""></td>
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td><input type="tel" name="mobile" value=""></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_members.php">Cancel</a></td>
                    <td><input type="submit" name="submit" value="Create Member" /></td>
                </tr>
            </table>
        </form>
        <br />
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
