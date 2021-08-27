<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already  ?>
<?php require_once("../includes/db_connection.php"); // connect to database  ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it  ?>
<?php require_once("../includes/validation_functions.php"); // validates any input we have  ?>
<?php confirm_logged_in(); // confirm if the admin logged in  ?>
<?php confirm_admin(); // confirm if the type is admin  ?>

<?php
  $user = find_member_by_id($_GET["id"]); // finds members by their id and gets their id which is stored in $_GET
  $trainer_set = find_all_trainers(); // find all trainers

  if (!$user) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("manage_members.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if user clicked on submit button
      // Process the form
      if (empty($errors)) { // if there are no errors
          // Perform Update
          $id = $user["id"]; // set the $id to user's id
          $admin = mysql_prep($_POST["admin"]); // get the admin from the input and set to $admin
          // MySQL query
          $query = "UPDATE users SET ";
          if ($admin === 'NULL') {
              $query .= "admin = {$admin} ";
          } else {
              $query .= "admin = '{$admin}' ";
          }
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          // if any row affected
          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Trainer updated.";
              redirect_to("manage_members.php");
          } else {
              // Failure
              $_SESSION["message"] = "Trainer update failed.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; // show the title plus ADMIN after it?>
<?php include("../includes/layouts/header.php"); // include the header.php?>
<div id="main">
    <div id="navigation">
        <a href="manage_members.php">&laquo; Members</a><br /><br />
        <hr />
        <p>Please select from list of the trainers and click on Assign to assign a trainer to a member.</p>
        <hr />
        <p>If you see a trainer has been set it means this user already has a trainer assigned.</p>
        <hr />
        <p>By choosing <strong>No Trainer</strong> you will assign no trainer to this member.</p>
    </div>
    <div id="page"> <?php echo message(); ?> <?php echo form_errors($errors); // echo any session message or any error(s)  ?>
        <h2>Assign a Trainer to Member: <?php echo htmlentities($user["username"]); ?></h2>
        <form action="assign_trainer.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
            <table style="margin-top: 20px; border: 1px solid black; padding: 10px;">
                <tr>
                    <td style="text-align: left;"><h2>Trainer:</h2></td>
                    <td>
                        <select name="admin">
                            <!--loop through result from trainer table-->
                            <?php while ($trainer = mysqli_fetch_assoc($trainer_set)) { ?>
                                  <option value="<?php echo htmlentities($trainer["username"]); ?>"
                                  <?php
                                  if ($user["admin"] == $trainer["username"]) {
                                      echo 'selected';
                                  }
                                  ?>>
                                              <?php echo htmlentities($trainer["username"]); ?>
                                  </option>
                              <?php } ?>
                            <?php
                              if (empty($user["admin"])) {
                                  echo '<option value="NULL" selected>No Trainer!</option>';
                              } else {
                                  echo '<option value="NULL">No Trainer!</option>';
                              }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_members.php"><h3>Cancel</h3></a></td>
                    <td><button class="buttons" type="submit" name="submit" value="Assign" onclick=" return confirm('Are you sure you want to update and change?');">Assign</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>