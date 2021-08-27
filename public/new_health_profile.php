<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_trainer(); ?>

<?php
  // Find member's ID to add a program
  $user = find_member_by_id($_GET["id"]);
  // To find health characteristics for each user
  $health_set = find_health_by_user_id($_GET["id"]);
?>
<?php
  // Can't add a new program unless we have a user as a parent!
  if (!$user || $user["admin"] !== $_SESSION["username"]) {
      // Health Profile ID was missing or invalid or
      // Health Profile couldn't be found in database or
      // user's trainer was not real
      redirect_to("manage_students.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form
      if (empty($errors)) {
          // Perform Create
          // make sure you add the user_id!
          $user_id = $user["id"];
          // be sure to escape the content
          $height = mysql_prep($_POST["height"]);
          $weight = mysql_prep($_POST["weight"]);
          $bmi = mysql_prep($_POST["bmi"]);
          $cholesterol = mysql_prep($_POST["cholesterol"]);
          $heart_rate = mysql_prep($_POST["heart_rate"]);
          $blood_pressure = mysql_prep($_POST["blood_pressure"]);

          $query = "INSERT INTO health_char (";
          $query .= "  user_id, height, weight, bmi, cholesterol, heart_rate, blood_pressure";
          $query .= ") VALUES (";
          $query .= "  {$user_id}, {$height}, {$weight}, {$bmi}, {$cholesterol}, {$heart_rate}, {$blood_pressure}";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Health Profile added.";
              redirect_to($_SERVER['HTTP_REFERER']);
          } else {
              // Failure
              $_SESSION["message"] = "Health Profile creation failed! Please fill out all the fields correctly!";
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
        <a href="manage_students.php">&laquo; Students</a>
        <br /><br />
        <hr />
        <p>Health Characteristics can be compared by date. Any new entry will be added on top.</p>
        <hr />
        <p>Decimal numbers are allowed until two.</p>
        <hr />
        <p>Please fill all the fields.</p>
        <hr />
        <p>Use numbers only.</p>
    </div>
    <div id="page"> <?php echo message(); ?>
        <!--New Health Profile-->
        <h2>Health Characteristics for <?php echo ucfirst(htmlentities($user["username"])); ?></h2>
        <form action="new_health_profile.php?id=<?php echo urlencode($user["id"]); ?>" method="POST">
            <table>
                <tr>
                    <td>Height:</td>
                    <td><input type="text" name="height" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> cm</td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="text" name="weight" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> kg</td>
                </tr>
                <tr>
                    <td>BMI:</td>
                    <td><input type="text" name="bmi" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> bmi</td>
                </tr>
                <tr>
                    <td>Cholesterol:</td>
                    <td><input type="text" name="cholesterol" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> mmol/L</td>
                </tr>
                <tr>
                    <td>Hearth Rate:</td>
                    <td><input type="text" name="heart_rate" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> pm</td>
                </tr>
                <tr>
                    <td>Blood Pressure:</td>
                    <td><input type="text" name="blood_pressure" value="" pattern="[0-9.0-9]+" placeholder="Enter Numbers Only" required/> bpm</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="manage_students.php">Cancel</a></td>
                    <td><button type="submit" name="submit" value="Add Program" >Add Program</button></td>
                </tr>
            </table>
        </form>
        <hr />
        <!--Older Health Characteristics-->
        <h2>Older Health Characteristics:</h2>
        <table border="1" style="border-collapse:collapse; width: 100%;">
            <tr>
                <th style="width: 100px;">Height</th>
                <th style="width: 100px;">Weight</th>
                <th style="width: 100px;">BMI</th>
                <th style="width: 100px;">Cholesterol</th>
                <th style="width: 100px;">Hearth Rate</th>
                <th style="width: 100px;">Blood Pressure</th>
                <th style="width: 100px;">Date & Time</th>
                <th style="width: 50px;">Action</th>
            </tr>
            <?php while ($health = mysqli_fetch_assoc($health_set)) { ?>
                  <tr>
                      <td class="centered"><?php echo htmlentities($health["height"]); ?> cm</td>
                      <td class="centered"><?php echo htmlentities($health["weight"]); ?> kg</td>
                      <td class="centered"><?php echo htmlentities($health["bmi"]); ?> bmi</td>
                      <td class="centered"><?php echo htmlentities($health["cholesterol"]); ?> mmol/L</td>
                      <td class="centered"><?php echo htmlentities($health["heart_rate"]); ?> pm</td>
                      <td class="centered"><?php echo htmlentities($health["blood_pressure"]); ?> bpm</td>
                      <td class="centered"><?php echo htmlentities($health["date"]); ?></td>
                      <td class="centered">
                          <a href="delete_health.php?id=<?php echo urlencode($health["id"]); ?>" onclick="return confirm('Are you sure you want to delete?');">
                              <img src="images/delete-icon.png" alt="Delete">
                          </a>
                      </td>
                  </tr>
              <?php } ?>
        </table>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
