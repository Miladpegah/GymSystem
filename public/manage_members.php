<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php $user_set = find_all_members(); ?>
<?php $layout_context = "admin"; ?>

<?php include("../includes/layouts/header.php"); ?>
<style>
    tr:nth-child(odd) { background-color: #cccccc; }
    tr:nth-child(even) { background-color: #999999; }
    td { border-right: 1px solid white; }
</style>
<div id="main">
    <div id="navigation">
        <a href="admin.php">&laquo; Main menu</a>
        <br /><br />
        <u><b><a  class="link" href="new_member.php">+ Add new member</a></b></u><br /><br />
        <hr />
        <p>You can add new member by clicking on the link above.</p>
        <hr />
        <p>You can assign a trainer, edit a member or delete a member by clicking on the links on the right inside the Action column.</p>
        <hr />
        <p>Members' account can be frozen or activated by clicking on the edit link.</p>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Manage Members</h2>
        <table>
            <tr>
                <th style="width: 100px;">Username</th>
                <th style="width: 100px;">First Name</th>
                <th style="width: 100px;">Last Name</th>
                <th style="width: 100px;">Date of Birth</th>
                <th style="width: 100px;">Address</th>
                <th style="width: 50px;">City</th>
                <th style="width: 100px;">Post Code</th>
                <th style="width: 100px;">Email</th>
                <th style="width: 100px;">Mobile</th>
                <th style="width: 500px;">Goal</th>
                <th colspan="2" style="width: 150px;">Actions</th>
            </tr>
            <?php while ($user = mysqli_fetch_assoc($user_set)) { ?>
                  <tr>
                      <th><?php echo htmlentities($user["username"]); ?></th>
                      <td><?php echo htmlentities($user["firstname"]); ?></td>
                      <td><?php echo htmlentities($user["lastname"]); ?></td>
                      <td><?php echo htmlentities($user["dob"]); ?></td>
                      <td><?php echo htmlentities($user["address"]); ?></td>
                      <td><?php echo htmlentities($user["city"]); ?></td>
                      <td><?php echo htmlentities($user["postcode"]); ?></td>
                      <td><?php echo htmlentities($user["email"]); ?></td>
                      <td><?php echo htmlentities($user["mobile"]); ?></td>
                      <td><?php if (empty($user["goal"])) { ?>
                      <center style="color: #cc0000;">No Goal Yet!</center>
                      <?php
                  } else {
                      echo htmlentities($user["goal"]);
                  }
                  ?>
                  </td>
                  <td><a class="link e_d_img" href="assign_trainer.php?id=<?php echo urlencode($user["id"]); ?>">Assign Trainer</a></td>
                  <td><a class="link e_d_img" title="Edit" href="edit_member.php?id=<?php echo urlencode($user["id"]); ?>">
                          <img src="images/edit-icon.png" alt="Edit">
                      </a>
                      <a class="link e_d_img" title="Delete" href="delete_member.php?id=<?php echo urlencode($user["id"]); ?>" onclick="return confirm('Are you sure you want to delete <?php echo htmlentities($user["username"]); ?>?');">
                          <img src="images/delete-icon.png" alt="Delete">
                      </a>
                  </td>
                  </tr>
              <?php } ?>
        </table>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
