<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_trainer(); ?>

<?php
  $admin = $_SESSION["admin_id"]; // store the session into variable $admin
  $admin_set = find_timetable_for_trainer($admin); // find timetable for trainers by reading from availability table where admin_id = the session
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
    tr { background-color: #FFCCFF; } td { border-right: 1px solid white; }
</style>
<div id="main">
    <div id="navigation">
        <a href="trainer.php">&laquo; Main menu</a>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Your Availability <?php echo ucfirst(htmlentities($_SESSION["username"])); ?></h2>
        <?php $timetable = mysqli_fetch_assoc($admin_set); ?>
        <?php if (empty($timetable["admin_id"])) { ?>
              <p style="font-weight: bold;">You do not have availability. Please add one by clicking on the button below.</p><br />
              <button type="submit" value="+ Add Availability" onclick="window.location.href = 'new_timetable.php?id=<?php echo urlencode($admin); ?>'" >+ Add Availability</button>
          <?php } else { ?>
              <table style="width: 100%;">
                  <tr>
                      <th style="width: 100px; height: 20px;">Monday</th>
                      <th style="width: 100px; height: 20px;">Tuesday</th>
                      <th style="width: 100px; height: 20px;">Wednesday</th>
                      <th style="width: 100px; height: 20px;">Thursday</th>
                      <th style="width: 100px; height: 20px;">Friday</th>
                      <th style="width: 100px; height: 20px;">Saturday</th>
                      <th style="width: 100px; height: 20px;">Sunday</th>
                      <th style="width: 50px; height: 20px;">Action</th>
                  </tr>
                  <?php if ($timetable) { ?>
                      <tr>
                          <td class="centered"><?php echo ($timetable["monday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["tuesday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["wednesday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["thursday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["friday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["saturday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["sunday"]); ?></td>
                      <?php } ?>
                      <th style="background: rgba(255,255,255,0);">
                          <a class="link" href="delete_timetable.php?id=<?php echo urlencode($timetable["id"]); ?>" onclick="return confirm('Are you sure you want to delete?');"><img class="e_d_img" src="images/Delete-icon.png" alt="Delete"/>
                          </a>
                      </th>
                  </tr>
              </table>
              <br>
              <p>You currently have availability as you submitted. If you want to add one you must delete the current one.</p>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
