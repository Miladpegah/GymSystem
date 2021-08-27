<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already           ?>
<?php require_once("../includes/db_connection.php"); // connect to database           ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it           ?>
<?php confirm_signned_in(); // confirm if you are logged in           ?>
<?php
  $user_id = $_SESSION["id"]; // store the session which had a number in it into a variable $user_id
  $session_set = find_session_by_user_id($user_id); // find exercise session by readinf from sessions table where user_id = the session
?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
    tr:nth-child(odd) { background-color: #cccccc; }
    tr:nth-child(even) { background-color: #a5a5a5; }
    td { border-right: 1px solid white; }
</style>
<div id="main">
    <div id="navigation">
        <p><a href="user_content.php">&laquo; Profile</a></p>
        <hr />
        <h3>Record your exercise session here to make sure your personal trainer find out about you.</h3>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Your Training Sessions <?php echo ucfirst(htmlentities($_SESSION["username"])); ?></h2>
        <?php if (mysqli_num_rows($session_set) == 0) { ?>
              <h3 style="color: #006633;">No Session Yet. You can add one.</h3>
          <?php } else { ?>
              <table border="1" style="border-collapse: collapse;">
                  <tr>
                      <th style="width: 300px;">Sessions</th>
                      <th style="width: 300px;">Comment</th>
                      <th style="width: 200px;">Date</th>
                      <th style="width: 50px;">Acton</th>
                  </tr>
                  <?php while ($session = mysqli_fetch_assoc($session_set)) { ?>
                      <tr>
                          <td style="padding: 1em;"><?php echo htmlentities($session["session_entry"]); ?></td>
                          <td style="padding: 1em;">
                              <?php if (empty($session["comment"])) { ?>
                                  <p class="centered" style="color:#CC0000;">No Comment yet.</p>
                              <?php } echo htmlentities($session["comment"]); ?>
                          </td>
                          <td class="centered"><?php echo htmlentities($session["date"]); ?></td>
                          <td class="centered">
                              <a class="link e_d_img" title="Delete" href="delete_session.php?id=<?php echo urlencode($session["id"]); ?>" onclick="return confirm('Are you sure you want to delete this session entry?Your trainer will not be able to see that!');">
                                  <img src="images/delete-icon.png" alt="Delete">
                              </a>
                          </td>
                      </tr>
                  <?php } ?>
              </table> <br />
          <?php } ?>
        <button class="buttons" onclick="window.location.href = 'new_session.php';">+ Add New Session</button>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>