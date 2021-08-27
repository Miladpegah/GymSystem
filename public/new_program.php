<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_trainer(); ?>

<?php
  // Find member's ID to add a program
  $user = find_member_by_id($_GET["id"]);
?>
<?php
  // Can't add a new program unless we have a user as a parent!
  if (!$user) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("manage_students.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form
      if (empty($errors)) {
          // Perform Create
          // make sure you add the user_id!
          $user_id = $user["id"];
          // be sure to escape the content
          $program = mysql_prep($_POST["program"]);

          $query = "INSERT INTO program (";
          $query .= "  user_id, program";
          $query .= ") VALUES (";
          $query .= "  {$user_id}, '{$program}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Program added.";
              redirect_to("manage_students.php");
          } else {
              // Failure
              $_SESSION["message"] = "Program creation failed.";
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
        <a href="manage_students.php">&laquo; Students</a>
    </div>
    <div id="page">
        <h2>Add your Program for <?php echo ucfirst(htmlentities($user["username"])); ?></h2>
        <form action="new_program.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
            <h4>Program:</h4><br />
            <textarea name="program" rows="20" cols="70">Please add your program here...</textarea> <br />
            <input type="submit" name="submit" value="Add Program" />
        </form>
        <br />
        <a href="manage_students.php">Cancel</a>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
