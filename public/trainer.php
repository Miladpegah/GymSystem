<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it ?>
<?php confirm_logged_in(); // confirm if you are logged in ?>
<?php confirm_trainer(); // confirm if the type is receptionist ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        <a href="logout.php"><b>Logout</b></a>
        <br /><br />
        <hr />
        <p>As a trainer you can see list of your students, give them a program, edit their program, comment on their exercise review, add health characteristics for them and answer any question they may have by clicking on <strong>List of your Students</strong>.</p>
        <hr />
        <p>You can add or delete your availability, which is viewable to receptionists and your students by clicking on <strong>Manage your Availability</strong>.</p>
    </div>
    <div id="page" class="animated fadeIn">
        <h2>Trainer Menu</h2>
        <h3>Welcome to the trainers area, <b style="color: green;"><?php echo ucfirst(htmlentities($_SESSION["username"])); ?>!</b></h3><br />
        <ul>
            <li><a class="link" href="manage_students.php">List of your student(s)</a></li>
            <li><a class="link" href="timetable.php">Manage Your Availability</a></li>
        </ul>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
