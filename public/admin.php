<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is included so we have session started already    ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if the admin logged in ?>
<?php confirm_admin(); // confirm if the type is admin ?>
<?php $layout_context = "admin"; // show the title plus ADMIN after it ?>
<?php include("../includes/layouts/header.php"); // include the header.php ?>

<div id="main">
    <div id="navigation">
        <a href="logout.php"><b>Logout</b></a><br /><br />
        <hr />
        <p>As a receptionist, you can create, update, read and delete the website content, any admin details including trainers and receptionist.</p>
        <hr />
        <p>You can edit your details. However you cannot delete yourself</p>
        <hr />
        <p>Make sure to logout after finishing any change.</p>
    </div>
    <div id="page"  class="animated fadeIn">
        <h2>Receptionist Menu</h2>
        <h3>Welcome to the receptionist area, <b style="color:green;"><?php echo ucfirst(htmlentities($_SESSION["username"])); ?>!</b></h3><br />
        <ul>
            <li><a class="link" href="manage_content.php">Manage Website Content</a></li>
            <li><a class="link" href="manage_admins.php">Manage Admin Users</a></li>
            <li><a class="link" href="manage_members.php">Manage Members</a></li>
        </ul>
    </div>
</div>
<?php
  include("../includes/layouts/footer.php"); // include the footer.php?>