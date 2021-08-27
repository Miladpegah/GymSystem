<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_signned_in(); // confirm if you are logged in ?>

<?php
  $question = find_question_by_id($_GET["id"]);
  if (!$question) {
      // question ID was missing or invalid or
      // question couldn't be found in database
      redirect_to("q_and_a.php");
  }

  $id = $question["id"];
  $query = "DELETE FROM q_and_a WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Question deleted.";
      redirect_to("q_and_a.php");
  } else {
      // Failure
      $_SESSION["message"] = "Question deletion failed.";
      redirect_to("q_and_a.php");
  }
?>
