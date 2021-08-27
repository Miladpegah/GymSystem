<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already  ?>
<?php require_once("../includes/db_connection.php"); // connect to database  ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it  ?>
<?php confirm_logged_in(); // confirm if you are logged in  ?>
<?php confirm_admin(); // confirm if the type is receptionist  ?>

<?php $self = $_SESSION["admin_id"]; // create $self variable and store the session in it?>
<?php
  $admin = find_admin_by_id($_GET["id"]); // finds admin by their id and gets their id which is stored in $_GET
  if (!$admin) {
      // admin ID was missing or invalid or
      // admin couldn't be found in database
      redirect_to("manage_admins.php");
  }
  $id = $admin["id"];
  if ($self === $id) {
      $_SESSION["message"] = "You cannot delete yourslef!";
      redirect_to("manage_admins.php");
  } else {
      $query = "DELETE FROM admins WHERE id = {$id} LIMIT 1";
      $result = mysqli_query($connection, $query);

      if ($result && mysqli_affected_rows($connection) == 1) {
          // Success
          $_SESSION["message"] = "Admin deleted.";
          redirect_to("manage_admins.php");
      } else {
          // Failure
          $_SESSION["message"] = "Admin deletion failed.";
          redirect_to("manage_admins.php");
      }
  }
?>
