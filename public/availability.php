<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already     ?>
<?php require_once("../includes/db_connection.php"); // connect to database     ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it     ?>
<?php confirm_logged_in(); // confirm if the admin logged in     ?>
<?php confirm_admin(); // confirm if the type is admin     ?>
<?php
  $admin = find_admin_by_id($_GET["id"]); // finds admin by their id and gets their id which is stored in $_GET
  $admin_set = find_timetable_for_trainer($admin["id"]); // finds tibetable for trainers by looking at admin's id
  $timetable = mysqli_fetch_assoc($admin_set); // puts the result into an array
?>
<?php
  // Checks to see if you are a receptionist and if you are then you don't have any availability
  if ($admin["type"] === "Receptionist") {
      redirect_to("manage_admins.php");
  }
?>
<?php $layout_context = "admin"; // show the title plus ADMIN after it    ?>
<?php include("../includes/layouts/header.php"); // include the header.php    ?>
<div id="main">
    <div id="navigation">
        <a href="manage_admins.php">&laquo; Admins</a> <br /><br />
        <hr />
        <p>In this page you are viewing the trainer availability for the week.</p>
    </div>
    <div id="page">
        <?php echo message(); // echo any session message or any error(s)?>
        <h2>Availability for <?php echo ucfirst(htmlentities($admin["username"])); ?></h2>

        <!--if there are no timetable for this admin-->
        <?php if (empty($timetable["admin_id"])) { ?>
              <p style="font-weight: bold; color: blueviolet;">This trainer does not have availability yet.</p><br />
              <!--if there is a timetable for this admin then create a table-->
          <?php } else { ?>
              <table border="1" style="border-collapse:collapse; width: 100%;">
                  <tr>
                      <th style="width: 100px;">Monday</th>
                      <th style="width: 100px;">Tuesday</th>
                      <th style="width: 100px;">Wednesday</th>
                      <th style="width: 100px;">Thursday</th>
                      <th style="width: 100px;">Friday</th>
                      <th style="width: 100px;">Saturday</th>
                      <th style="width: 100px;">Sunday</th>
                  </tr>
                  <?php if ($timetable) { // if timetable exists?>
                      <tr>
                          <td class="centered"><?php echo ($timetable["monday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["tuesday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["wednesday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["thursday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["friday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["saturday"]); ?></td>
                          <td class="centered"><?php echo ($timetable["sunday"]); ?></td>
                      </tr>
                  <?php } // end of if ?>
              </table>
          <?php } // end of else ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); // include the footer.php ?>
