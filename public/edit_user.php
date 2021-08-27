<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already   ?>
<?php require_once("../includes/db_connection.php"); // connect to database   ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it   ?>
<?php require_once("../includes/validation_functions.php"); // validates any input we have   ?>
<?php confirm_signned_in(); // confirm if you are logged in   ?>

<?php
  $user_set = $_SESSION["id"]; // create a variable called $user_set and store the session in it
  $user = find_member_by_id($user_set); // finds members by their id and gets their id which is stored in session

  if (!$user) {
      // admin ID was missing or invalid or
      // admin couldn't be found in database
      redirect_to("edit_profile.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      // validations for username MUST be filled out
      $required_fields = array("username");
      validate_presences($required_fields);
      // validations for username MUST less than 50 character
      $fields_with_max_lengths = array("username" => 50);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) { // if there are no errors
          // Perform Update
          $id = $user["id"];
          $username = mysql_prep($_POST["username"]); // gets the username from input and set it to mysql username column
          $firstname = mysql_prep($_POST["firstname"]); // gets the firstname from input and set it to mysql firstname column
          $lastname = mysql_prep($_POST["lastname"]); // gets the lastname from input and set it to mysql lastname column
          $dob = mysql_prep($_POST["dob"]);  // gets the date of birth from input and set it to mysql date of birth column
          $address = mysql_prep($_POST["address"]);  // gets the address from input and set it to mysql address column
          $city = mysql_prep($_POST["city"]);  // gets the city from input and set it to mysql city column
          $postcode = mysql_prep($_POST["postcode"]);  // gets the postcode from input and set it to mysql postcode column
          $email = mysql_prep($_POST["email"]);  // gets the email from input and set it to mysql email column
          $mobile = mysql_prep($_POST["mobile"]);  // gets the mobile from input and set it to mysql mobile column
          $goal = mysql_prep($_POST["goal"]);  // gets the goal from texarea and set it to mysql goal column
          $picture = addslashes(file_get_contents($_FILES["picture"]["tmp_name"])); // gets the picture from input and set it to mysql picture column
          // MySQL query
          $query = "UPDATE users SET ";
          $query .= "username = '{$username}', ";
          $query .= "firstname = '{$firstname}', ";
          $query .= "lastname = '{$lastname}', ";
          $query .= "dob = '{$dob}', ";
          $query .= "address = '{$address}', ";
          $query .= "city = '{$city}', ";
          $query .= "postcode = '{$postcode}', ";
          $query .= "email = '{$email}', ";
          $query .= "mobile = '{$mobile}', ";
          $query .= "goal = '{$goal}' ";
          if (empty($user["picture"])) {
              $query .= ", picture = '{$picture}' ";
          }
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "You have updated your profile.";
              redirect_to("edit_profile.php");
          } else {
              // Failure
              $_SESSION["message"] = "Update failed.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <a href="edit_profile.php">&laquo; Your Profile</a><br />
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); ?>
        <h2>Edit Profile: <?php echo htmlentities($user["username"]); ?></h2>
        <form action="edit_user.php?id=<?php echo urlencode($user["id"]); ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="min-width: 100px;">Username:</td>
                    <td><input type="text" name="username" value="<?php echo htmlentities($user["username"]); ?>"></td>
                </tr>

                <tr>
                    <td style="min-width: 100px;">First Name:</td>
                    <td><input type="text" name="firstname" value="<?php echo htmlentities($user["firstname"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Last Name:</td>
                    <td><input type="text" name="lastname" value="<?php echo htmlentities($user["lastname"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Date of Birth:</td>
                    <td><input type="date" name="dob" value="<?php echo $user["dob"]; ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Address:</td>
                    <td><input type="text" name="address" value="<?php echo htmlentities($user["address"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">City:</td>
                    <td><input type="text" name="city" value="<?php echo htmlentities($user["city"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Post Code:</td>
                    <td><input type="text" name="postcode" value="<?php echo htmlentities($user["postcode"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Email:</td>
                    <td><input type="email" name="email" value="<?php echo htmlentities($user["email"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Mobile:</td>
                    <td><input type="tel" name="mobile" value="<?php echo htmlentities($user["mobile"]); ?>"></td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Goals:</td>
                    <td>
                        <textarea name="goal" cols="40" rows="10" style="max-width: 500px;" placeholder="Please add your goal for example what you want to achieve so your personal trainer can see and give you a program based on that. If you do not add a goal here, you cannot expect any program from your trainer!"><?php echo htmlentities($user["goal"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="min-width: 100px;">Profile Picture</td>
                    <td>
                        <?php if (empty($user["picture"])) { ?>
                              <input type="file" name="picture" /><br /><span style="color: #CC0000;">Max Size: 2MB</span>
                          <?php } else { ?>
                              You currently have profile picture.<br />
                              <a href="edit_user_pic.php?id=<?php echo urlencode($user["id"]); ?>">Click Here</a> to replace it.
                          <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="min-width: 100px;"><a href="edit_profile.php">Cancel</a></td>
                    <td><button class="buttons" name="submit" type="submit">Submit</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>