<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php $admin_set = find_all_admins(); // finds all admins ?>
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
        <u><b><a class="link" href="new_admin.php">+ Add New Admin</a></b></u>
        <hr />
        <p>You can add new trainer or new receptionist by clicking on the link above. </p>
        <hr />
        <p>Personal Trainers have availability, which you can assign any member to them by their name and availability.</p>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Manage Admins</h2>
        <table border="1">
            <tr>
                <th style="width: 150px;">Username</th>
                <th style="width: 150px;">User Type</th>
                <th>Availability</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
                  <tr>
                      <td style="text-align: left;"><?php echo htmlentities($admin["username"]); ?></td>
                      <td><?php echo htmlentities($admin["type"]); ?></td>
                      <td>
                          <?php if ($admin["type"] === "Trainer") { ?>
                              <a class="link" href="availability.php?id=<?php echo urlencode($admin["id"]); ?>">Availability</a>
                          <?php } else { ?>
                              ---------------
                          <?php } ?>
                      </td>
                      <td>
                          <a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">
                              <img class="e_d_img" src="images/Edit-icon.png" alt="Edit"/>
                          </a>
                      </td>
                      <td>
                          <a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure you want to delete <?php echo htmlentities($admin["username"]); ?>?');">
                              <img class="e_d_img" src="images/Delete-icon.png" alt="Delete"/>
                          </a>
                      </td>
                  </tr>
              <?php } ?>
        </table>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
