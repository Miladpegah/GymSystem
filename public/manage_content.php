<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(); ?>

<div id="main">
    <div id="navigation">
        <br />
        <a href="admin.php">&laquo; Main menu</a><br />
        <?php echo navigation($current_subject, $current_page); ?>
        <br />
        <u><b><a href="new_subject.php">+ Add a subject</a></b></u>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php if ($current_subject) { ?>
              <h2>Manage Subject</h2>
              Menu name: <?php echo htmlentities($current_subject["menu_name"]); ?><br />
              Position: <?php echo $current_subject["position"]; ?><br />
              Visible: <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?><br />
              <br />
              <button style="width: 100px; height: 20px;" onclick="window.location.href = 'edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>';">Edit Subject</button>
              <hr />
              <div>
                  <h3>Pages in this subject:</h3>
                  <ul>
                      <?php
                      $subject_pages = find_pages_for_subject($current_subject["id"], false);
                      while ($page = mysqli_fetch_assoc($subject_pages)) {
                          echo "<li>";
                          $safe_page_id = urlencode($page["id"]);
                          echo "<a class=\"link\" href=\"manage_content.php?page={$safe_page_id}\">";
                          echo htmlentities($page["menu_name"]);
                          echo "</a>";
                          echo "</li>";
                      }
                      ?>
                  </ul>
                  <br />
                  <button style="width: 200px; height: 20px;" onclick="window.location.href = 'new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>';">+ Add a new page to this subject</button>
              </div>

          <?php } elseif ($current_page) { ?>
              <h2>Manage Page</h2>
              Menu name: <?php echo htmlentities($current_page["menu_name"]); ?><br />
              Position: <?php echo $current_page["position"]; ?><br />
              Visible: <?php echo $current_page["visible"] == 1 ? 'yes' : 'no'; ?><br />
              Content:<br />
              <div class="view-content">
                  <?php echo nl2br(htmlentities($current_page["content"])); ?>
              </div>
              <br />
              <br />
              <button style="width: 100px; height: 20px;" onclick="window.location.href = 'edit_page.php?page=<?php echo urlencode($current_page['id']); ?>';">Edit page</button>
          <?php } else { ?>
              <h2>Please select a subject or a page.</h2>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
