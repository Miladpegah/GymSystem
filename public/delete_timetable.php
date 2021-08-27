<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already  ?>
<?php require_once("../includes/db_connection.php"); // connect to database  ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it  ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  $timetable = find_timetable_by_id($_GET["id"]);
  if (!$timetable) {
      // question ID was missing or invalid or
      // question couldn't be found in database
      redirect_to("q_and_a.php");
  }

  $id = $timetable["id"];
  $query = "DELETE FROM availability WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Timetable deleted.";
      redirect_to("timetable.php");
  } else {
      // Failure
      $_SESSION["message"] = "Timetable deletion failed.";
      redirect_to("timetable.php");
  }
?>
