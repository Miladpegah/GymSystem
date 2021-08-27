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
      $required_fields = array("username", "password", "type");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) {
          // Perform Create

          $username = mysql_prep($_POST["username"]);
          $hashed_password = password_encrypt($_POST["password"]);
          $type = mysql_prep($_POST["type"]);

          $query = "INSERT INTO admins (";
          $query .= " username, hashed_password, type";
          $query .= ") VALUES (";
          $query .= "  '{$username}', '{$hashed_password}', '{$type}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Admin created.";
              redirect_to("manage_admins.php");
          } else {
              // Failure
              $_SESSION["message"] = "Admin creation failed. Maybe duplicate USERNAME! Please change it and try again.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
    td, tr { padding: 5px; } input { padding: 2px; }
</style>
<div id="main">
    <div id="navigation">
        <a href="manage_admins.php">&laquo; Admins</a><br />
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); ?>
        <h2>Create Admin</h2>
        <form action="new_admin.php" method="post">
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
                    <td>Type:</td>
                    <td><select name="type">
                            <option value="Receptionist">Receptionist</option>
                            <option value="Trainer">Trainer</option>
                        </select>
                    </td>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr><tr>
                    <td><a class="link" href="manage_admins.php">Cancel</a></td>
                    <td><button type="submit" name="submit" value="Create Admin" >Create Admin</button></td>
                </tr>
            </table>
        </form>
        <br />
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
