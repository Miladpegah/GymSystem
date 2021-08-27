<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is receptionist ?>

<?php
  $health = find_health_by_id($_GET["id"]);
  if (!$health) {
      // question ID was missing or invalid or
      // question couldn't be found in database
      redirect_to($_SERVER['HTTP_REFERER']);
  }

  $id = $health["id"];
  $query = "DELETE FROM health_char WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Health Profile deleted.";
      redirect_to($_SERVER['HTTP_REFERER']);
  } else {
      // Failure
      $_SESSION["message"] = "Health Profile failed.";
      redirect_to($_SERVER['HTTP_REFERER']);
  }
?>