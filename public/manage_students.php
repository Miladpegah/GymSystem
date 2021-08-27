<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_trainer(); ?>

<?php
  $user_admin = $_SESSION["username"]; // store the session into a variable $user_admin
  $user_set = find_user_for_trainer($user_admin); // finds users for trainer by reading from users table and find which one's have this trainer in their admin column
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
    tr:nth-child(odd) { background-color: #cccccc; }
    tr:nth-child(even) { background-color: #a5a5a5; }
    td { border-right: 1px solid white; }
</style>
<div id="main">
    <div id="navigation">
        <a href="trainer.php">&laquo; Main menu</a>
        <br /><br />
        <hr />
        <p>Add a new program for your students or edit the current one by clicking on <strong>Add or Edit Program.</strong></p>
        <hr />
        <p>View exercise history of every single one of your students by clicking on <strong>Exercise History.</strong></p>
        <hr />
        <p>View and add health profile for your students and compare the difference by clicking on <strong>Health Profile.</strong></p>
        <hr />
        <p>Answer any question your student may have by clicking on <strong>Answer Questions.</strong></p>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Your Students <?php echo ucfirst(htmlentities($_SESSION["username"])); ?></h2>
        <?php if (mysqli_num_rows($user_set) === 0) { ?>
              <p>You currently have no student.</p>
          <?php } else { ?>
              <table border="1" style="border-collapse:collapse; ">
                  <tr>
                      <th style="width: 100px;">First Name</th>
                      <th style="width: 100px;">Last Name</th>
                      <th style="width: 100px;">Date of Birth</th>
                      <th style="width: 100px;">Email</th>
                      <th style="width: 100px;">Mobile</th>
                      <th style="width: 200px;">Goal</th>
                      <th colspan="4" style="width: 150px;">Actions</th>
                  </tr>
                  <?php while ($user = mysqli_fetch_assoc($user_set)) { ?>
                      <tr>
                          <td><?php echo htmlentities($user["firstname"]); ?></td>
                          <td><?php echo htmlentities($user["lastname"]); ?></td>
                          <td><?php echo htmlentities($user["dob"]); ?></td>
                          <td><?php echo htmlentities($user["email"]); ?></td>
                          <td><?php echo htmlentities($user["mobile"]); ?></td>
                          <td><?php
                              if (htmlentities($user["goal"]) == NULL) {
                                  echo '<center style="color: red;">No goal yet!</center>';
                              } else {
                                  echo htmlentities($user["goal"]);
                              }
                              ?>
                          </td>
                          <?php
                          $program_set = find_program_by_user($user["id"]);
                          $program = mysqli_fetch_assoc($program_set);
                          ?>
                          <td> <?php if (!($program["user_id"])) { ?>
                                  <a class="link" href="new_program.php?id=<?php echo urlencode($user["id"]); ?>">Add Program</a>
                              <?php } else { ?>
                                  <a class="link" href="edit_program.php?id=<?php echo urlencode($user["id"]); ?>">Edit Program</a>
                              </td>
                          <?php } ?>
                          <td><a class="link" href="exercise.php?id=<?php echo urlencode($user["id"]); ?>">Exercise  History</a></td>
                          <td><a class="link" href="new_health_profile.php?id=<?php echo urlencode($user["id"]); ?>">Health Profile</a></td>
                          <td><a class="link" href="answers.php?id=<?php echo urlencode($user["id"]); ?>">Answer Questions</a></td>
                      </tr>
                  <?php } //end of while loop ?>
              </table>
              <br />
          <?php } //end of else ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
