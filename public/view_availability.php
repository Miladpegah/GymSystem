<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already        ?>
<?php require_once("../includes/db_connection.php"); // connect to database        ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it        ?>
<?php confirm_signned_in(); // confirm if you are logged in        ?>
<?php
  $admin = find_admin_by_id($_GET["id"]); // finds admin by their id and gets their id which is stored in $_GET
  $timetable_set = find_timetable_for_trainer($admin["id"]); // finds timetable by their id and gets their id which is stored in $_GET
  $timetable = mysqli_fetch_assoc($timetable_set); // puts the result into an array
  // to prevent user from viewing rest of the trainers availability
  $user_set = $_SESSION["id"];
  $user = find_member_by_id($user_set);
  // if user's trainer wasn't the real
  if ($admin["username"] != $user["admin"]) {
      // redirect to the first page
      redirect_to("user_content.php");
  }
?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
    tr { background-color: #99ccff; } td { border-right: 1px solid white; }
</style>
<div id="main">
    <div id="navigation">
        <p><a href="user_content.php">&laquo; Profile</a></p>
        <hr />
        <h3>If you have a personal trainer, you can see his or her availability in this page.</h3>
    </div>
    <div id="page">
        <?php include("../includes/layouts/rightbox.php"); ?>
        <?php echo message(); ?>
        <h2>Availability for <?php echo ucfirst(htmlentities($admin["username"])); ?></h2>
        <?php if (empty($timetable["admin_id"])) { ?>
              <p style="font-weight: bold; color: blueviolet;">This trainer does not have availability yet.</p><br />
          <?php } else { ?>
              <table style="border-collapse:collapse; width: 100%;">
                  <tr>
                      <th style="width: 100px; height: 30px;">Monday</th>
                      <th style="width: 100px; height: 30px;">Tuesday</th>
                      <th style="width: 100px; height: 30px;">Wednesday</th>
                      <th style="width: 100px; height: 30px;">Thursday</th>
                      <th style="width: 100px; height: 30px;">Friday</th>
                      <th style="width: 100px; height: 30px;">Saturday</th>
                      <th style="width: 100px; height: 30px;">Sunday</th>
                  </tr>
                  <?php if ($timetable) { ?>
                      <tr>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["monday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["tuesday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["wednesday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["thursday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["friday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["saturday"]); ?></td>
                          <td style="padding-top:20px;" class="centered"><?php echo ($timetable["sunday"]); ?></td>
                      </tr>
                  <?php } ?>
              </table>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
