<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_signned_in(); ?>
<?php
  find_selected_session();
  $user_id = $_SESSION["id"];
?>
<?php
  // Can't add a new page unless we have a user as a parent!
  if (!$user_id) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("sessions.php");
  }
?>
<?php
  if (isset($_POST['submit'])) {
      // Process the form
      // Validate

      $required_fields = array("session");
      validate_presences($required_fields);

      if (empty($errors)) {
          // Perform Create
          // make sure you add the subject_id!
          // be sure to escape the content
          $session = mysql_prep($_POST["session"]);

          $query = "INSERT INTO sessions (";
          $query .= "  user_id, session_entry";
          $query .= ") VALUES (";
          $query .= "  {$user_id}, '{$session}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Training Session added.";
              redirect_to("sessions.php");
          } else {
              // Failure
              $_SESSION["message"] = "Session creation failed.";
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
        <a href="sessions.php">&laquo; Training Sessions</a>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>

        <h2>Add your Exercise Session</h2>
        <form action="new_session.php" method="POST">
            <h4>Session:</h4><br />
            <textarea required name="session" rows="10" cols="40" style="max-width: 600px;" placeholder="Please add your exercise training session here..."></textarea><br />
            <input class="buttons" type="submit" name="submit" value="Add Session" />
        </form>
        <br />
        <a href="sessions.php">Cancel</a>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
