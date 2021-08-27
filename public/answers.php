<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if the admin logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  $question_set = find_questions_by_user_id($_GET["id"]); // finds user's questions by their id and gets their id by $_GET method
  $user_set = find_user($_GET["id"]); // finds user by their id and gets their id by $_GET method
  $user = mysqli_fetch_assoc($user_set); // puts the result from user table into an array

  if (!$question_set || $user["admin"] !== $_SESSION["username"]) {
      // Question ID was missing or invalid or
      // Question Profile couldn't be found in database or
      // Question trainer was not real
      redirect_to("manage_students.php");
  }
?>

<?php $layout_context = "admin"; // show the title plus ADMIN after it ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <a href="manage_students.php">&laquo; Profile</a>
    </div>
    <div id="page">
        <?php echo message(); // show any session message on top ?>
        <!--gets the username and show the questions are from this username-->
        <h2>Questions from <?php echo ucfirst(htmlentities($user["username"])); ?> : </h2>
        <!--checks to see if you have any question at all-->
        <?php if (mysqli_num_rows($question_set) === 0) { ?>
              <p>There is no question from this member!</p>
          <?php } else {  // if you have any question then create a table ?>
              <table border="1" style="border-collapse:collapse; width: 100%;">
                  <tr>
                      <th style="width: 100px;">Questions</th>
                      <th style="width: 100px;">Answers</th>
                      <th style="width: 100px;">Date & Time</th>
                  </tr>
                  <?php while ($question = mysqli_fetch_assoc($question_set)) {  // gets all questions and loop though it?>
                      <tr>
                          <td><?php echo htmlentities($question["question"]); // shows the question ?></td>
                          <td>
                              <?php echo htmlentities($question["answer"]); // show the answer ?>
                              <br /><br />
                              <!--create a button called Answer which gets the question id by $_GET method-->
                              <button style="float: right;" type="submit" value="Answer" onclick="window.location.href = 'edit_answer.php?id=<?php echo urlencode($question["id"]); ?>'" >Answer</button>
                          </td>
                          <td><center><?php echo htmlentities($question["date"]); ?></center></td>
                      </tr>
                  <?php } // end of while loop ?>
              </table>
          <?php } // end of else ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); // include the footer.php ?>
