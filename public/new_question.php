<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_signned_in(); ?>

<?php
  find_selected_question();
  $user_id = $_SESSION["id"];
?>
<?php
  // Can't add a new page unless we have a user as a parent!
  if (!$user_id) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("q_and_a.php");
  }
?>
<?php
  if (isset($_POST['submit'])) {
      // Process the form
      // Validate

      $required_fields = array("question");
      validate_presences($required_fields);

      if (empty($errors)) {
          // Perform Create
          // make sure you add the subject_id!
          // be sure to escape the content
          $question = mysql_prep($_POST["question"]);

          $query = "INSERT INTO q_and_a (";
          $query .= "  user_id, question";
          $query .= ") VALUES (";
          $query .= "  {$user_id}, '{$question}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Question added.";
              redirect_to("q_and_a.php");
          } else {
              // Failure
              $_SESSION["message"] = "Question creation failed.";
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
        <a href="q_and_a.php">&laquo; Questions & Answers</a>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>

        <h2>Add your Question</h2>
        <form action="new_question.php" method="post">
            <h4>Question:</h4><br />
            <textarea required name="question" rows="10" cols="40" style="max-width: 600px;" placeholder="Please ask your question here from your trainer..."></textarea> <br />
            <input class="buttons" type="submit" name="submit" value="Add Question" />
        </form>
        <br />
        <a href="q_and_a.php">Cancel</a>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
