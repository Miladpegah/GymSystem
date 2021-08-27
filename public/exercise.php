<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  $session_set = find_session_by_user_id($_GET["id"]); // finds session entry by their id and gets their id which is stored in $_GET
  $user_set = find_user($_GET["id"]); // finds members by their id and gets their id which is stored in $_GET
  $user = mysqli_fetch_assoc($user_set); // puts the result into an array

  if (!$session_set || $user["admin"] !== $_SESSION["username"]) {
      // session ID was missing or invalid or
      // session couldn't be found in database or
      // user's trainer not equal to actual trainer
      redirect_to("manage_students.php");
  }
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <a href="manage_students.php">&laquo; Profile</a>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Exercise History from <span style="color: green"><?php echo ucfirst(htmlentities($user["username"])); ?></span></h2>
        <!--Checks to see if session exists-->
        <?php if (mysqli_num_rows($session_set) === 0) { ?>
              <p>There are no exercise history for this member.</p>
          <?php } else { ?>
              <table border="1" style="border-collapse: collapse; width: 100%;">
                  <tr>
                      <th style="width: 400px;">Sessions</th>
                      <th style="width: 400px;">Comment</th>
                      <th style="width: 200px;">Date</th>
                  </tr>
                  <?php while ($session = mysqli_fetch_assoc($session_set)) { ?>
                      <tr>
                          <td><?php echo htmlentities($session["session_entry"]); ?></td>
                          <td>
                              <?php echo htmlentities($session["comment"]); ?>
                              <br /> <br />
                              <button style="float: right;" type="submit" value="Comment" onclick="window.location.href = 'comment.php?id=<?php echo urlencode($session["id"]); ?>'">Comment</button>
                          </td>
                          <td><center><?php echo htmlentities($session["date"]); ?></center></td>
                      </tr>
                  <?php } ?>
              </table>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
