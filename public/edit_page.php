<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php find_selected_page(); ?>

<?php
  if (!$current_page) {
      redirect_to("manage_content.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form

      $id = $current_page["id"];
      $menu_name = mysql_prep($_POST["menu_name"]);
      $position = (int) $_POST["position"];
      $visible = (int) $_POST["visible"];
      $content = mysql_prep($_POST["content"]);

      // validations
      $required_fields = array("menu_name", "position", "visible", "content");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("menu_name" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) {

          // Perform Update

          $query = "UPDATE pages SET ";
          $query .= "menu_name = '{$menu_name}', ";
          $query .= "position = {$position}, ";
          $query .= "visible = {$visible}, ";
          $query .= "content = '{$content}' ";
          $query .= "WHERE id = {$id} ";
          $query .= "LIMIT 1";
          $result = mysqli_query($connection, $query);

          if ($result && mysqli_affected_rows($connection) == 1) {
              // Success
              $_SESSION["message"] = "Page updated.";
              redirect_to("manage_content.php?page={$id}");
          } else {
              // Failure
              $_SESSION["message"] = "Page update failed.";
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
        <?php echo navigation($current_subject, $current_page); ?>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>

        <h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>
        <form action="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>" method="post">
            <table class="user_table">
                <tr>
                    <td>Menu name:</td>
                    <td><input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>" /></td>
                </tr>
                <tr>
                    <td>Position:</td>
                    <td>
                        <select name="position">
                            <?php
                              $page_set = find_pages_for_subject($current_page["subject_id"], false);
                              $page_count = mysqli_num_rows($page_set);
                              for ($count = 1; $count <= $page_count; $count++) {
                                  echo "<option value=\"{$count}\"";
                                  if ($current_page["position"] == $count) {
                                      echo " selected";
                                  }
                                  echo ">{$count}</option>";
                              }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Visible:</td>
                    <td>
                        <input type="radio" name="visible" value="0" <?php
                          if ($current_page["visible"] == 0) {
                              echo "checked";
                          }
                        ?> /> No
                        &nbsp;
                        <input type="radio" name="visible" value="1" <?php
                          if ($current_page["visible"] == 1) {
                              echo "checked";
                          }
                        ?>/> Yes
                    </td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Edit Page" /></td>
                </tr>
                <tr>
                    <td>
                        <a href="manage_content.php?page=<?php echo urlencode($current_page["id"]); ?>">Cancel</a>
                    </td>
                    <td>
                        <a href="delete_page.php?page=<?php echo urlencode($current_page["id"]); ?>" onclick="return confirm('Are you sure?');">Delete page</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
