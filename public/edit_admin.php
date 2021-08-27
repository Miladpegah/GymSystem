<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php require_once("../includes/validation_functions.php"); // validates any input we have ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_admin(); // confirm if the type is receptionist ?>

<?php
  $admin = find_admin_by_id($_GET["id"]); // finds admin by their id and gets their id which is stored in $_GET

  if (!$admin) {
      // admin ID was missing or invalid or
      // admin couldn't be found in database
      redirect_to("manage_admins.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      // validations for username and password MUST be filled
      $required_fields = array("username", "password");
      validate_presences($required_fields);
      // validations for username MUST NOT be more than 30 character
      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) {

          // Perform Update

          $id = $admin["id"];
          $username = mysql_prep($_POST["username"]); // get the username from input called username
          $hashed_password = password_encrypt($_POST["password"]); // get the password and encrypt it
          $type = mysql_prep($_POST["type"]); // get the admin type from combo box called type
          // MySQL query
          $query = "UPDATE admins SET ";
          $query .= "username = '{$username}', ";
          $query .= "hashed_password = '{$hashed_password}', ";
          $query .= "type = '{$type}' ";
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Admin updated.";
              redirect_to("manage_admins.php");
          } else {
              // Failure
              $_SESSION["message"] = "Admin update failed.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; // show the title plus ADMIN after it ?>
<?php include("../includes/layouts/header.php"); // include the header.php ?>
<div id="main">
    <div id="navigation">
        <a href="manage_admins.php">&laquo; Admins</a><br />
        <hr />
        <p>If you are changing the username or the password, please remember to fill out the both fields.</p>
        <hr />
        <p>If you are changing any details of a receptionist or a trainer, then you will have to give them a new password so they can change it later.</p>
        <hr />
        <p>Remember you can change your type but you cannot delete yourself.</p>
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); // echo any session message or any error(s)    ?>
        <h2>Edit Admin: <?php echo htmlentities($admin["username"]); ?></h2>

        <!--create a form-->
        <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post">
            <table class='center'>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value=""> (Type your password again to change the settings.)</td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <!--combo box-->
                    <td><select name="type" style="width: 153px;">
                            <?php
                              echo htmlentities($admin["type"]);
                              if ($admin["type"] == "Receptionist") {
                                  ?>
                                  <option value="Receptionist" selected>Receptionist</option>
                                  <option value="Trainer">Trainer</option>
                              <?php } else { ?>
                                  <option value="Trainer" selected>Trainer</option>
                                  <option value="Receptionist">Receptionist</option>
                              <?php }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_admins.php">Cancel</a></td>
                    <td><button type="submit" name="submit">Edit Admin</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); // include the footer.php ?>
