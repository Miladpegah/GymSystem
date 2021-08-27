<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_signned_in(); ?>
<div id="right_box">
    <h3 style="border-bottom: 2px solid black;">What's New</h3>
    <?php
      find_selected_page(true);
      echo member_navigation($current_subject, $current_page);
    ?>
</div>