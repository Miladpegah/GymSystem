<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already            ?>
<?php require_once("../includes/db_connection.php"); // connect to database            ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it            ?>
<?php confirm_signned_in(); // confirm if you are logged in            ?>

<?php
  $user_id = $_SESSION["id"]; // store the session into a variable $user_id
  $program_set = find_program($user_id); // find user program by reading from program table in database
  $user_set = find_user($user_id); // finds all members by reading from users table in database
  $user = mysqli_fetch_assoc($user_set) // puts the result into an array
?>

<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <p><a href="user_content.php">&laquo; Profile</a></p>
        <hr />
        <h3>Here's your program given by your personal trainer.</h3>
        <hr />
        <h3>Add your record everyday in your exercise session to show you are following this program.</h3>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php $program = mysqli_fetch_assoc($program_set) ?>
        <h2>Your Program :
            <?php
              echo '<span style="color: green;">';
              echo ucfirst(htmlentities($_SESSION["username"]));
              echo '!</span>';
            ?>
        </h2>
        <?php if (empty($program["program"])) { ?>
              <span style="color:#CC0000; font-weight: bold;">You do not have a program yet! It might be because:<br /><br /></span>
              <ul style="color:#CC0000;">
                  <li>you have no personal trainer.</li>
                  <li>You have no goal yet</li>
                  <li> your personal trainer has not given you a program yet.</li>
              </ul>
          <?php } else { ?>
              <div id="program">
                  <?php echo nl2br(htmlentities($program["program"])); ?>
                  <br />
                  <div style="float: right; font-weight: bold; margin-top: 0.5em;">
                      Date & Time:
                      <?php echo htmlentities($program["date"]); ?>
                  </div>
              </div>
          <?php } ?>
        <h3>Your personal Trainer:
            <?php
              if (empty($user["admin"])) {
                  echo '<span style="color: blueviolet;">No personal trainer! Please ask in the receptionist.</span>';
              } else {
                  echo '<span style="color: green;">';
                  echo ucfirst(htmlentities($user["admin"]));
                  echo '</span>';
              }
            ?>
        </h3>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
