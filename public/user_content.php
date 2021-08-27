<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_signned_in(); ?>
<?php
  $user_id = $_SESSION["id"]; 
  $user_set = find_user($user_id);
  $user = mysqli_fetch_assoc($user_set);
  $trainer_set = find_trainer_by_username($user["admin"]);
  $trainer = mysqli_fetch_assoc($trainer_set);
?>

<?php $layout_context = "public"; ?>

<?php include("../includes/layouts/header.php"); ?>
<?php if ($user["freeze"] == 0) { ?>
      <h1 class="frozen">Sorry <?php echo ucfirst($user["username"]); ?>! Your account is frozen. Please talk to the receptionists.<br /><a class="frozen" href="logout.php">Logout</a></h1>
  <?php } else { ?>
      <div id="main">
          <div id="navigation">
              <h4><a href="user_content.php">Your Profile</a></h4>
              <h4><a href="edit_profile.php">Edit Profile <br /> Add a goal</a></h4>
              <?php if (!(empty($user["admin"]))) { ?>
                  <h4><a href="view_availability.php?id=<?php echo urlencode($trainer["id"]); ?>">Your Trainer's Availability</a></h4>
                  <h4><a href="programs.php">Your Program</a></h4>
                  <h4><a href="q_and_a.php">Questions & Answers</a></h4>
                  <h4><a href="health_profile.php">Health Profile</a></h4>
              <?php } ?>
              <h4><a href="sessions.php">Training Sessions</a></h4>
              <hr />
              <h4><a href="logout.php">Logout</a></h4>
              <hr />
          </div>
          <div id="page" class="animated fadeIn">
              <?php include("../includes/layouts/rightbox.php"); ?>
              <?php if ($current_page) { ?>
                  <h2><?php echo htmlentities($current_page["menu_name"]); ?></h2>
                  <?php echo nl2br(htmlentities($current_page["content"])); ?>
              <?php } else { ?>
                  <h2>Welcome <b><?php echo ucfirst(htmlentities($_SESSION["username"])); ?>!</b></h2>
                  <?php if (empty($user["goal"])) { ?>
                      <h4 style="color: #006633; font-weight: bold;">You currently have no goal. Please add one by clicking on the right link.</h4>
                  <?php } ?>
                  <?php if (empty($user["admin"])) { ?>
                      <h4 style="color: #006633; font-weight: bold;">You currently have no personal trainer. To get one, Please talk to the receptionists.</h4>
                  <?php } else { ?>
                      <h3>Your personal trainer is <span style="color: green;"><?php echo ucfirst($user["admin"]); ?></span>
                          <a class="link" href="view_availability.php?id=<?php echo urlencode($trainer["id"]); ?>">click here</a> to see your trainer's availability.</h3>
                  <?php } ?>
                  <hr />
                  <h3>Did you work-out today?</h3>
                  <h1><button class="buttons" onclick="window.location.href = 'sessions.php';">+ Add Training Session Today</button></h1>
              <?php } ?>
          </div>
      </div>
  <?php } ?>
<?php include("../includes/layouts/footer.php"); ?>
