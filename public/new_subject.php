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
        <?php echo navigation($current_subject, $current_page); ?>
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php $errors = errors(); ?>
        <?php echo form_errors($errors); ?>

        <h2>Create Subject</h2>
        <form action="create_subject.php" method="post">
            <table class="user_table">
                <tr>
                    <td>Menu name:</td>
                    <td><input type="text" name="menu_name" value="" /></td>
                </tr>
                <tr>
                    <td>Position:</td>
                    <td><select name="position">
                            <?php
                              $subject_set = find_all_subjects(false);
                              $subject_count = mysqli_num_rows($subject_set);
                              for ($count = 1; $count <= ($subject_count + 1); $count++) {
                                  echo "<option value=\"{$count}\">{$count}</option>";
                              }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Visible:</td>
                    <td><input type="radio" name="visible" value="0" /> No
                        &nbsp;
                        <input type="radio" name="visible" value="1" /> Yes</td>
                </tr>
                <tr>
                    <td><a href="manage_content.php">Cancel</a></td>
                    <td><input type="submit" name="submit" value="Create Subject" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
