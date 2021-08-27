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
<div id="main">
    <div id="navigation">
        <a href="user_content.php">&laquo; Back</a>
    </div>
    <div id="page"><?php echo message(); ?>
        <?php if (empty($user["picture"])) { ?>
              <span class="profile_pic" style="padding: 50px 5px;">No profile Picture</span>
          <?php } else { ?>
              <img class="profile_pic" height="150" width="150" alt="pic" src="data:image/jpeg;base64,<?php echo base64_encode($user['picture']); ?>">
          <?php } ?>
        <h2>Your Profile | <a class="link" href="edit_user.php?id=<?php echo urlencode($user["id"]); ?>">Edit</a></h2>
        <table class="user_table">
            <tr>
                <td class="profile">Username:</td>
                <td><?php echo htmlentities($user["username"]); ?></td>
            </tr>
            <tr>
                <td class="profile">First name:</td>
                <td><?php echo htmlentities($user["firstname"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Last name:</td>
                <td><?php echo htmlentities($user["lastname"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Gender:</td>
                <td><?php echo htmlentities($user["gender"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Date of Birth:</td>
                <td><?php echo htmlentities($user["dob"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Address:</td>
                <td><?php echo htmlentities($user["address"]); ?></td>
            </tr>
            <tr>
                <td class="profile">City:</td>
                <td><?php echo htmlentities($user["city"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Post code:</td>
                <td><?php echo htmlentities($user["postcode"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Email:</td>
                <td><?php echo htmlentities($user["email"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Mobile:</td>
                <td><?php echo htmlentities($user["mobile"]); ?></td>
            </tr>
            <tr>
                <td class="profile">Goal:</td>
                <td>
                    <?php if ($user["goal"] == "") { ?>
                          <span style="color:#cc0000; font-weight: bold;">You currently have no goals! To write a goal just <a href="edit_user.php?id=<?php echo urlencode($user["id"]); ?>">click here</a>.</span>
                      <?php } ?>
                    <?php echo htmlentities($user["goal"]); ?>
                </td>
            </tr>
            <tr>
                <td class="profile">Your Trainer:</td>
                <td><?php if (empty($user["admin"])) { ?>
                          <span style="color: #cc0000; font-weight: bold;">No personal trainer yet! To get one, please speak to the receptionists.</span>
                      <?php } else { ?>
                          <span style = "color: blue;"><?php echo htmlentities($user["admin"]); ?></span>
                          <br />
                          <a href="view_availability.php?id=<?php echo urlencode($trainer["id"]); ?>">Availability</a>
                      <?php }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="profile">&nbsp;</td>
                <td>
                    <button class="buttons" type="button" value="edit" style="width: 100px; height: 30px;" onclick="window.location.href = 'edit_user.php?id=<?php echo urlencode($user["id"]); ?>
                                    ';">Edit</button>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
