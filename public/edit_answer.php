<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  $answer_set = find_question_by_id($_GET["id"]); // finds questions by their id and gets their id which is stored in $_GET

  $user_set = find_user($_GET["id"]); // finds members by their id and gets their id which is stored in $_GET
  $user = mysqli_fetch_assoc($user_set);  // puts the result into an array

  if (!$answer_set) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("answers.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      if (empty($errors)) {
          // Perform Update
          $id = $answer_set["id"];
          $answer = mysql_prep($_POST["answer"]); // get the answer from input called answer
          // MySQL query
          $query = "UPDATE q_and_a SET ";
          $query .= "answer = '{$answer}' ";
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Answer updated.";
              // We could not use the function redirect_to because we need to go 2 pages back as PHP submits the form to itself.
              // redirect_to("answers.php");
              ?>
              <!--This Java Script function goes 2 pages back-->
              <script type="text/javascript">window.history.go(-2);</script>
              <?php
          } else {
              // Failure
              $_SESSION["message"] = "Answer update failed.";
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
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">&laquo; Questions & Answers</a><br />
    </div>
    <div id="page">
        <h2>Edit Answer for Question:</h2>
        <h3><?php echo htmlentities($answer_set["question"]); ?></h3>
        <form action="edit_answer.php?id=<?php echo urlencode($answer_set["id"]); ?>" method="post">
            <table class='center'>
                <tr>
                    <td>Answer:</td>
                    <td><textarea name="answer" rows="10" cols="50"><?php echo htmlentities($answer_set["answer"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Cancel</a></td>
                    <td><button type="submit" name="submit" value="Edit Answer">Edit Answer</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>