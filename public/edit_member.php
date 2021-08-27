<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php
  $user = find_member_by_id($_GET["id"]);

  if (!$user) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("manage_members.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      // validations
      $required_fields = array("username");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) { // if there are no errors
          // Perform Update
          $id = $user["id"];
          $username = mysql_prep($_POST["username"]);
          $firstname = mysql_prep($_POST["firstname"]);
          $lastname = mysql_prep($_POST["lastname"]);
          $gender = mysql_prep($_POST["gender"]);
          $dob = mysql_prep($_POST["dob"]);
          $address = mysql_prep($_POST["address"]);
          $city = mysql_prep($_POST["city"]);
          $postcode = mysql_prep($_POST["postcode"]);
          $email = mysql_prep($_POST["email"]);
          $mobile = mysql_prep($_POST["mobile"]);
          $goal = mysql_prep($_POST["goal"]);
          $status = (int) $_POST["status"]; 
          // MySQL query
          $query = "UPDATE users SET ";
          $query .= "username = '{$username}', ";
          $query .= "firstname = '{$firstname}', ";
          $query .= "lastname = '{$lastname}', ";
          $query .= "gender = '{$gender}', ";
          $query .= "dob = '{$dob}', ";
          $query .= "address = '{$address}', ";
          $query .= "city = '{$city}', ";
          $query .= "postcode = '{$postcode}', ";
          $query .= "email = '{$email}', ";
          $query .= "mobile = '{$mobile}', ";
          $query .= "goal = '{$goal}', ";
          $query .= "freeze = {$status} ";
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Member updated.";
              redirect_to("manage_members.php");
          } else {
              // Failure
              $_SESSION["message"] = "Member update failed! You cannot update the same details.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style type="text/css">td {min-width: 110px; } </style>
<div id="main">
    <div id="navigation">
        <a href="manage_members.php">&laquo; Members</a><br /><br />
        <hr />
        <p>You can edit every details of a member.</p>
        <hr />
        <p>Username and password are required.</p>
        <hr />
        <p>You cannot edit the goal as this is set by members themselves.</p>
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); ?>
        <?php if (empty($user["picture"])) { ?>
              <span class="profile_pic" style="padding: 50px 5px;">No profile Picture</span>
          <?php } else { ?>
              <img class="profile_pic" height="150" width="150" alt="pic" src="data:image/jpeg;base64,<?php echo base64_encode($user['picture']); ?>">
          <?php } ?>
        <h2>Edit Member: <?php echo htmlentities($user["username"]); ?></h2>
        <form action="edit_member.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
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
                    <td style="min-width: 100px;">Gender:</td>
                    <td>
                        <select name="gender" >
                            <?php
                              echo htmlentities($user["gender"]);
                              if ($user["gender"] === "Female") {
                                  ?>
                                  <option value="Female" selected>Female</option>
                                  <option value="Male">Male</option>
                              <?php } else { ?>
                                  <option value="Male" selected>Male</option>
                                  <option value="Female">Female</option>
                              <?php }
                            ?>
                        </select>
                    </td>
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
                        <textarea name="goal" cols="40" rows="10" style="max-width: 4500px;"><?php echo htmlentities($user["goal"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Personal Trainer:</td>
                    <td><?php if (empty($user["admin"])) { ?>
                              <span style="color: #CC0000;">No Personal Trainer</span>
                              <?php
                          } else {
                              echo htmlentities($user["admin"]);
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Account Status:</td>
                    <td>
                        <input type="radio" name="status" value="1" onclick="return confirm('Are you sure you want to activate the account?');" <?php
                          if ($user["freeze"] == 1) {
                              echo "checked";
                          }
                        ?> /> Active
                        &nbsp;
                        <input type="radio" name="status" value="0" onclick="return confirm('Are you sure you want to freeze the account?');" <?php
                          if ($user["freeze"] == 0) {
                              echo "checked";
                          }
                        ?>/> Freeze
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_members.php">Cancel</a></td>
                    <td><button type="submit" name="submit">Edit Member</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>