<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_admin(); // confirm if the type is receptionist ?>

<?php
  $user = find_member_by_id($_GET["id"]);
  if (!$user) {
      // member ID was missing or invalid or
      // member couldn't be found in database
      redirect_to("manage_members.php");
  }

  $id = $user["id"];
  $query = "DELETE FROM users WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Member deleted.";
      redirect_to("manage_members.php");
  } else {
      // Failure
      $_SESSION["message"] = "Member deletion failed.";
      redirect_to("manage_members.php");
  }
?>
