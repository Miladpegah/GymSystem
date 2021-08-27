<?php require_once("../includes/session.php"); // MUST BE FIRST session.php is required so we have session started already    ?>
<?php require_once("../includes/db_connection.php"); // connect to database    ?>
<?php require_once("../includes/functions.php"); // function.php required once so we use functions inside it    ?>
<?php confirm_signned_in(); // confirm if you are logged in    ?>
<?php
  $user_id = $_SESSION["id"]; // store the session into a variable $user_id
  $question_set = find_questions_by_user_id($user_id); // find questions by reading from questions table where user id = the session
  $user_set = find_member_by_id($user_id); // find this member by id which is stored in the session
  ?>
  <?php $layout_context = "public"; ?>
  <?php include("../includes/layouts/header.php"); ?>
  <style>
  	tr:nth-child(odd) { background-color: #cccccc; }
  	tr:nth-child(even) { background-color: #a5a5a5; }
  	td { border-right: 1px solid white; }
  </style>
  <div id="main">
  	<div id="navigation">
  		<p><a href="user_content.php">&laquo; Profile</a></p>
  		<br />
  	</div>
  	<div id="page">
  		<?php echo message(); ?>
  		<h2>
  			Questions & Answers
  			<?php
  			echo '<span style="color: green;">';
  			echo ucfirst(htmlentities($_SESSION["username"]));
  			echo '</span>';
  			?>
  		</h2>
  		<?php if (empty($user_set["admin"])) { ?>
  		<p style="color: #006633; font-weight: bold;">You Cannot ask any questions because you have no personal trainer yet.</p>
  		<p style="color: #006633; font-weight: bold;">To get a personal trainer, please talk to the receptionists.</p>
  		<?php } else { ?>
  		<table border="1" style="border-collapse: collapse;">
  			<tr>
  				<th style="width: 300px;">Your Questions</th>
  				<th style="width: 300px;">The Answers</th>
  				<th style="width: 150px;">Date & Time</th>
  				<th style="width: 50px;">Acton</th>
  			</tr>
  			<?php while ($user = mysqli_fetch_assoc($question_set)) { ?>
  			<tr>
  				<td style="padding: 1em;"><?php echo htmlentities($user["question"]); ?></td>
  				<td style="color: #006633; padding: 1em;">
  					<?php
  					if (empty($user["answer"])) {
  						echo "<center style=\"color: darkred;\">";
  						echo "Waiting to be answered...";
  						echo "</center>";
  					} else {
  						echo htmlentities($user["answer"]);
  					}
  					?>
  				</td>
  				<td><center><?php echo htmlentities($user["date"]); ?></center></td>
  				<td>
  					<center>
  						<a class="link e_d_img" title="Delete" href="delete_question.php?id=<?php echo urlencode($user["id"]); ?>" onclick="return confirm('Are you sure you want to delete?');">
  							<img src="images/delete-icon.png" alt="Delete">
  						</a>
  					</center>
  				</td>
  			</tr>
  			<?php } ?>
  		</table> <br />
  		<button class="buttons" onclick="window.location.href = 'new_question.php';">+ Add New Question</button>
  		<?php } ?>
  	</div>
  </div>
  <?php include("../includes/layouts/footer.php"); ?>