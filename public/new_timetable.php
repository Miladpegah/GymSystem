<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_trainer(); ?>

<?php
  // Find member's ID to add a program
  $admin = find_admin_by_id($_SESSION["admin_id"]);
?>
<?php
  // Can't add a new program unless we have a user as a parent!
  if (!$admin) {
      // user ID was missing or invalid or
      // user couldn't be found in database
      redirect_to("timetable.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form
      // Validations

      if (empty($errors)) {
          // Perform Create
          // make sure you add the admin_id!
          $admin_id = $admin["id"];
          // be sure to escape the content
          $monday = ($_POST["monday"]);
          $tuesday = ($_POST["tuesday"]);
          $wednesday = ($_POST["wednesday"]);
          $thursday = ($_POST["thursday"]);
          $friday = ($_POST["friday"]);
          $saturday = ($_POST["saturday"]);
          $sunday = ($_POST["sunday"]);

          $query = "INSERT INTO availability (";
          $query .= " admin_id, ";
          $query .= " monday, ";
          $query .= " tuesday, ";
          $query .= " wednesday, ";
          $query .= " thursday, ";
          $query .= " friday, ";
          $query .= " saturday, ";
          $query .= " sunday ";
          $query .= ") VALUES (";
          $query .= " {$admin_id}, ";
          foreach ($monday as $m_value) {
              $query .= " '{$m_value}' ";
          } $query .= ", ";
          foreach ($tuesday as $t_value) {
              $query .= " '{$t_value}' ";
          } $query .= ", ";
          foreach ($wednesday as $w_value) {
              $query .= " '{$w_value}' ";
          } $query .= ", ";
          foreach ($thursday as $th_value) {
              $query .= " '{$th_value}' ";
          } $query .= ", ";
          foreach ($friday as $f_value) {
              $query .= " '{$f_value}' ";
          } $query .= ", ";
          foreach ($saturday as $sa_value) {
              $query .= " '{$sa_value}' ";
          } $query .= ", ";
          foreach ($sunday as $su_value) {
              $query .= " '{$su_value}' ";
          }
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Availability added.";
              redirect_to("timetable.php");
          } else {
              // Failure
              $_SESSION["message"] = "Availability creation failed.";
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
        <a href="timetable.php">&laquo; Availability</a>
    </div>
    <div id="page">
        <h2>Add your Availability <?php echo ucfirst(htmlentities($admin["username"])); ?></h2>
        <form action="new_timetable.php?id=<?php echo urlencode($admin["id"]); ?>" method="POST">
            <h3 style="color: #cc0000;">Multiple selection by holding "ctrl" key on Windows and "cmd" key on Mac</h3>
            <br />
            <table>
                <thead>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="timetable" name="monday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="tuesday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="wednesday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="thursday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="friday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="saturday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                        <td>
                            <select class="timetable" name="sunday[]" multiple="multiple" required>
                                <option value="Not Available!<br />">Not Available!</option>
                                <option value="07:00 - 09:00<br />">07:00 - 09:00</option>
                                <option value="09:00 - 11:00<br />">09:00 - 11:00</option>
                                <option value="11:00 - 13:00<br />">11:00 - 13:00</option>
                                <option value="13:00 - 15:00<br />">13:00 - 15:00</option>
                                <option value="15:00 - 17:00<br />">15:00 - 17:00</option>
                                <option value="17:00 - 19:00<br />">17:00 - 19:00</option>
                                <option value="19:00 - 21:00<br />">19:00 - 21:00</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table><br />
            <a href="timetable.php">Cancel</a>&nbsp;
            <button type="submit" name="submit" value="Add Availability">Add Availability</button>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
