<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  // Find the progrmam to edit
  $program_id = find_program_by_user_id($_GET["id"]);
  // Find username to display on top
  $user_set = find_member_by_id($_GET["id"]);

  // if there are no program or there are no trainers for the member
  if (!$program_id || $user_set["admin"] !== $_SESSION["username"]) {
      // program ID was missing or invalid or
      // program couldn't be found in database
      // user's trainer not equal to actual trainer
      redirect_to("manage_students.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form if there are no errors
      if (empty($errors)) {
          // Perform Update
          $user = $program_id["user_id"];
          $program = mysql_prep($_POST["program"]); // gets the program from textarea and set it to mysql program column
          // MySQL query
          $query = "UPDATE program SET ";
          $query .= "program = '{$program}' ";
          $query .= "WHERE user_id = {$user} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Program updated.";
              redirect_to("manage_students.php");
          } else {
              // Failure
              $_SESSION["message"] = "Program update failed.";
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
        <a href="manage_students.php">&laquo; Students</a><br />
    </div>
    <div id="page">
        <h2>Edit Program for <?php echo ucfirst(htmlentities($user_set["username"])); ?></h2>
        <form action="edit_program.php?id=<?php echo urlencode($program_id["user_id"]); ?>" method="POST">
            <table class='center'>
                <tr>
                    <td>Program:</td>
                    <td>
                        <textarea name="program" rows="20" cols="70"><?php echo htmlentities($program_id["program"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><?php echo htmlentities($program_id["date"]); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_students.php">Cancel</a></td>
                    <td><button name="submit" value="button" type="submit">Edit Program</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>