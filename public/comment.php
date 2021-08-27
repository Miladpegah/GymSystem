<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already ?>
<?php require_once("../includes/db_connection.php"); // connect to database ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is trainer ?>

<?php
  $comment_set = find_session_by_id($_GET["id"]); // finds training session by their id and gets their id which is stored in $_GET

  $user_set = find_user($_GET["id"]); // finds members by their id and gets their id which is stored in $_GET
  $user = mysqli_fetch_assoc($user_set); // puts the result into an array

  if (!$comment_set) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("sessions.php");
  }
?>
<?php
  if (isset($_POST['submit'])) { // if submit button is clicked
      // Process the form
      if (empty($errors)) { // if there are no errors
          // Perform Update
          $id = $comment_set["id"];
          $comment = mysql_prep($_POST["comment"]);

          // MySQL query
          $query = "UPDATE sessions SET ";
          $query .= "comment = '{$comment}' ";
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          // if any database row affected
          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Comment updated.";
              // We could not use the function redirect_to because we need to go 2 pages back as PHP submits the form to itself.
              // redirect_to("sessions.php");
              ?>
              <!--This Java Script function goes 2 pages back-->
              <script type="text/javascript">window.history.go(-2);</script>
              <?php
          } else {
              // Failure
              $_SESSION["message"] = "Comment update failed.";
          }
      }
  } else {
      // This is probably a GET request
  } // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; // show the title plus ADMIN after it ?>
<?php include("../includes/layouts/header.php"); // include the header.php ?>
<div id="main">
    <div id="navigation">
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>">&laquo; Exercise History</a><br />
    </div>
    <div id="page">
        <h2>Edit Comment for Session Entry:</h2>
        <!--echo the session entry-->
        <h3><?php echo htmlentities($comment_set["session_entry"]); ?></h3>
        <form action="comment.php?id=<?php echo urlencode($comment_set["id"]); ?>" method="POST">
            <table class='center'>
                <tr>
                    <td>Comment:</td>
                    <!--echo the comment-->
                    <td><textarea name="comment" rows="10" cols="50"><?php echo htmlentities($comment_set["comment"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>">Cancel</a></td>
                    <td><button type="submit" name="submit" value="Edit Comment">Edit Comment</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>