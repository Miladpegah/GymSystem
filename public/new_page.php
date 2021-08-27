<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_admin(); ?>

<?php find_selected_page(); ?>

<?php
  // Can't add a new page unless we have a subject as a parent!
  if (!$current_subject) {
      // subject ID was missing or invalid or
      // subject couldn't be found in database
      redirect_to("manage_content.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {
      // Process the form
      // validations
      $required_fields = array("menu_name", "position", "visible", "content");
      validate_presences($required_fields);

      $fields_with_max_lengths = array("menu_name" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if (empty($errors)) {
          // Perform Create
          // make sure you add the subject_id!
          $subject_id = $current_subject["id"];
          $menu_name = mysql_prep($_POST["menu_name"]);
          $position = (int) $_POST["position"];
          $visible = (int) $_POST["visible"];
          // be sure to escape the content
          $content = mysql_prep($_POST["content"]);

          $query = "INSERT INTO pages (";
          $query .= "  subject_id, menu_name, position, visible, content";
          $query .= ") VALUES (";
          $query .= "  {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
          $query .= ")";
          $result = mysqli_query($connection, $query);

          if ($result) {
              // Success
              $_SESSION["message"] = "Page created.";
              redirect_to("manage_content.php?subject=" . urlencode($current_subject["id"]));
          } else {
              // Failure
              $_SESSION["message"] = "Page creation failed.";
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

        <h2>Create Page</h2>
        <form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
            <table>
                <tr>
                    <td>Menu name:</td>
                    <td><input type="text" name="menu_name" value="" /></td>
                </tr>
                <tr>
                    <td>Position:</td>
                    <td>
                        <select name="position">
                            <?php
                              $page_set = find_pages_for_subject($current_subject["id"], false);
                              $page_count = mysqli_num_rows($page_set);
                              for ($count = 1; $count <= ($page_count + 1); $count++) {
                                  echo "<option value=\"{$count}\">{$count}</option>";
                              }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Visible:</td>
                    <td><input type="radio" name="visible" value="0" /> No
                        &nbsp;
                        <input type="radio" name="visible" value="1" /> Yes
                    </td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name="content" rows="20" cols="80"></textarea></td>
                </tr>
                <td><a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a></td>
                <td><input type="submit" name="submit" value="Create Page" /></td>
            </table>
        </form>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
