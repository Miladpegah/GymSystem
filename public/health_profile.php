<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already     ?>
<?php require_once("../includes/db_connection.php"); // connect to database     ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it     ?>
<?php confirm_signned_in(); // confirm if you are logged in     ?>
<?php
  $user_id = $_SESSION["id"]; // store the session in a variable $user_id
  $health_set = find_health_by_user_id($user_id); // finds health profile by their user id and gets their user id id which is stored in the session
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
        <h3>Track your changes here which is recorded by your personal trainer.</h3>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Your Health Profile <?php echo ucfirst(htmlentities($_SESSION["username"])); ?>:</h2>
        <?php if (mysqli_num_rows($health_set) === 0) { ?>
              <h3 style="color: #006633;">No Health Profile Yet! Please check with your personal trainer.</h3>
          <?php } else { ?>
              <table border="1" style="border-collapse: collapse; width: 100%;">
                  <tr>
                      <th style="width: 100px;">Height</th>
                      <th style="width: 100px;">Weight</th>
                      <th style="width: 100px;">BMI</th>
                      <th style="width: 100px;">Cholesterol</th>
                      <th style="width: 100px;">Heart Rate</th>
                      <th style="width: 100px;">Blood Pressure</th>
                      <th style="width: 100px;">Date</th>
                  </tr>
                  <?php while ($health = mysqli_fetch_assoc($health_set)) { ?>
                      <tr>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["height"]); ?> cm</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["weight"]); ?> kg</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["bmi"]); ?> bmi</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["cholesterol"]); ?> mmol/L</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["heart_rate"]); ?> pm</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["blood_pressure"]); ?> bpm</td>
                          <td class="centered" style="padding: 5px;"><?php echo htmlentities($health["date"]); ?></td>
                      </tr>
                  <?php } ?>
              </table>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>