<?php

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

function mysql_prep($string) {
	global $connection;

	$escaped_string = mysqli_real_escape_string($connection, $string);
	return $escaped_string;
}

function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}

function form_errors($errors = array()) {
	$output = "";
	if (!empty($errors)) {
		$output .= "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach ($errors as $key => $error) {
			$output .= "<li>";
			$output .= htmlentities($error);
			$output .= "</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}

function find_all_subjects($public = true) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	if ($public) {
		$query .= "WHERE visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$subject_set = mysqli_query($connection, $query);
	confirm_query($subject_set);
	return $subject_set;
}

function find_pages_for_subject($subject_id, $public = true) {
	global $connection;

	$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE subject_id = {$safe_subject_id} ";
	if ($public) {
		$query .= "AND visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$page_set = mysqli_query($connection, $query);
	confirm_query($page_set);
	return $page_set;
}

function find_default_page_for_subject($subject_id) {
	$page_set = find_pages_for_subject($subject_id);
	if ($first_page = mysqli_fetch_assoc($page_set)) {
		return $first_page;
	} else {
		return null;
	}
}

function find_subject_by_id($subject_id, $public = true) {
	global $connection;

	$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id = {$safe_subject_id} ";
	if ($public) {
		$query .= "AND visible = 1 ";
	}
	$query .= "LIMIT 1";
	$subject_set = mysqli_query($connection, $query);
	confirm_query($subject_set);
	if ($subject = mysqli_fetch_assoc($subject_set)) {
		return $subject;
	} else {
		return null;
	}
}

function find_page_by_id($page_id, $public = true) {
	global $connection;

	$safe_page_id = mysqli_real_escape_string($connection, $page_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id = {$safe_page_id} ";
	if ($public) {
		$query .= "AND visible = 1 ";
	}
	$query .= "LIMIT 1";
	$page_set = mysqli_query($connection, $query);
	confirm_query($page_set);
	if ($page = mysqli_fetch_assoc($page_set)) {
		return $page;
	} else {
		return null;
	}
}

function find_selected_page($public = false) {
	global $current_subject;
	global $current_page;

	if (isset($_GET["subject"])) {
		$current_subject = find_subject_by_id($_GET["subject"], $public);
		if ($current_subject && $public) {
			$current_page = find_default_page_for_subject($current_subject["id"]);
		} else {
			$current_page = null;
		}
	} elseif (isset($_GET["page"])) {
		$current_subject = null;
		$current_page = find_page_by_id($_GET["page"], $public);
	} else {
		$current_subject = null;
		$current_page = null;
	}
}

function find_question_by_id($question_id, $public = true) {
	global $connection;

	$safe_question_id = mysqli_real_escape_string($connection, $question_id);

	$query = "SELECT * ";
	$query .= "FROM q_and_a ";
	$query .= "WHERE id = {$safe_question_id} ";
	$query .= "LIMIT 1";
	$question_set = mysqli_query($connection, $query);
	confirm_query($question_set);
	if ($question = mysqli_fetch_assoc($question_set)) {
		return $question;
	} else {
		return null;
	}
}

function find_health_by_id($health_id, $public = true) {
	global $connection;

	$safe_health_id = mysqli_real_escape_string($connection, $health_id);

	$query = "SELECT * ";
	$query .= "FROM health_char ";
	$query .= "WHERE id = {$safe_health_id} ";
	$query .= "LIMIT 1";
	$health_set = mysqli_query($connection, $query);
	confirm_query($health_set);
	if ($health = mysqli_fetch_assoc($health_set)) {
		return $health;
	} else {
		return null;
	}
}

function find_all_admins() {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "ORDER BY username ASC";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}

function find_all_trainers() {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE type = 'Trainer' ";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}

function find_user($id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM users ";
	$query .= "WHERE id = {$id}";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_program($id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM program ";
	$query .= "WHERE user_id = {$id}";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_questions_by_user_id($id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM q_and_a ";
	$query .= "WHERE user_id = {$id}";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_session_by_user_id($id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM sessions ";
	$query .= "WHERE user_id = {$id}";
	$session_set = mysqli_query($connection, $query);
	confirm_query($session_set);
	return $session_set;
}

function find_health_by_user_id($id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM health_char ";
	$query .= "WHERE user_id = {$id} ";
	$query .= "ORDER BY date DESC";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_all_members() {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM users ";
	$query .= "ORDER BY username ASC";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_user_for_trainer($admin) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM users ";
	$query .= "WHERE admin = '{$admin}'";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_timetable_for_trainer($admin) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM availability ";
	$query .= "WHERE admin_id = {$admin}";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}

function find_admin_by_id($admin_id) {
	global $connection;

	$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE id = {$safe_admin_id} ";
	$query .= "LIMIT 1";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	if ($admin = mysqli_fetch_assoc($admin_set)) {
		return $admin;
	} else {
		return null;
	}
}

function find_member_by_id($user_id) {
	global $connection;

	$safe_user_id = mysqli_real_escape_string($connection, $user_id);

	$query = "SELECT * ";
	$query .= "FROM users ";
	$query .= "WHERE id = {$safe_user_id} ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_assoc($user_set)) {
		return $user;
	} else {
		return null;
	}
}

function find_trainer_by_username($username) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE username = '{$username}'";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}

function find_admin_username($username) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE username = '{$username}'";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}

function find_admin_by_username($username, $type) {
	global $connection;

	$safe_username = mysqli_real_escape_string($connection, $username);
	$safe_type = mysqli_real_escape_string($connection, $type);

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE username = '{$safe_username}' ";
	$query .= "AND type = '{$safe_type}' ";
	$query .= "LIMIT 1";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	if ($admin = mysqli_fetch_assoc($admin_set)) {
		return $admin;
	} else {
		return null;
	}
}

function find_user_by_username($username) {
	global $connection;

	$safe_username = mysqli_real_escape_string($connection, $username);

	$query = "SELECT * ";
	$query .= "FROM users ";
	$query .= "WHERE username = '{$safe_username}' ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_assoc($user_set)) {
		return $user;
	} else {
		return null;
	}
}

function find_session_by_id($session_id) {
	global $connection;

	$safe_session_id = mysqli_real_escape_string($connection, $session_id);

	$query = "SELECT * ";
	$query .= "FROM sessions ";
	$query .= "WHERE id = {$safe_session_id} ";
	$query .= "LIMIT 1";
	$session_set = mysqli_query($connection, $query);
	confirm_query($session_set);
	if ($session = mysqli_fetch_assoc($session_set)) {
		return $session;
	} else {
		return null;
	}
}

function find_timetable_by_id($timetable_id) {
	global $connection;

	$safe_timetable_id = mysqli_real_escape_string($connection, $timetable_id);

	$query = "SELECT * ";
	$query .= "FROM availability ";
	$query .= "WHERE id = {$safe_timetable_id} ";
	$query .= "LIMIT 1";
	$timetable_set = mysqli_query($connection, $query);
	confirm_query($timetable_set);
	if ($imetable = mysqli_fetch_assoc($timetable_set)) {
		return $imetable;
	} else {
		return null;
	}
}

function find_program_by_user_id($program_id) {
	global $connection;

	$safe_program_id = mysqli_real_escape_string($connection, $program_id);

	$query = "SELECT * ";
	$query .= "FROM program ";
	$query .= "WHERE user_id = {$safe_program_id} ";
	$query .= "LIMIT 1";
	$program_set = mysqli_query($connection, $query);
	confirm_query($program_set);
	if ($program = mysqli_fetch_assoc($program_set)) {
		return $program;
	} else {
		return null;
	}
}

function find_program_by_user($user_id) {
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM program ";
	$query .= "WHERE user_id = {$user_id}";
	$user_set = mysqli_query($connection, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_selected_program($public = false) {
	global $user_id;
	global $current_program;

	if (isset($_GET["user"])) {
		$user_id = find_member_by_id($_GET["user"]);
		$current_program = null;
	} elseif (isset($_GET["program"])) {
		$user_id = null;
		$current_program = find_program_by_id($_GET["program"], $public);
	} else {
		$user_id = null;
		$current_program = null;
	}
}

function find_selected_question($public = false) {
	global $current_user;
	global $current_question;

	if (isset($_GET["user"])) {
		$current_user = find_member_by_id($_GET["user"]);
		$current_question = null;
	} elseif (isset($_GET["question"])) {
		$current_user = null;
		$current_question = find_question_by_id($_GET["question"], $public);
	} else {
		$current_user = null;
		$current_question = null;
	}
}

function find_selected_session($public = false) {
	global $current_user;
	global $current_session;

	if (isset($_GET["user"])) {
		$current_user = find_member_by_id($_GET["user"]);
		$current_session = null;
	} elseif (isset($_GET["session"])) {
		$current_user = null;
		$current_session = find_session_by_id($_GET["session"], $public);
	} else {
		$current_user = null;
		$current_session = null;
	}
}

// navigation takes 2 arguments
// - the current subject array or null
// - the current page array or null
function navigation($subject_array, $page_array) {
	$output = "<ul class=\"subjects\">";
	$subject_set = find_all_subjects(false);
	while ($subject = mysqli_fetch_assoc($subject_set)) {
		$output .= "<li";
		if ($subject_array && $subject["id"] == $subject_array["id"]) {
			$output .= " class=\"selected\"";
		}
		$output .= ">";
		$output .= "<a href=\"manage_content.php?subject=";
		$output .= urlencode($subject["id"]);
		$output .= "\">";
		$output .= htmlentities($subject["menu_name"]);
		$output .= "</a>";

		$page_set = find_pages_for_subject($subject["id"], false);
		$output .= "<ul class=\"pages\">";
		while ($page = mysqli_fetch_assoc($page_set)) {
			$output .= "<li";
			if ($page_array && $page["id"] == $page_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?page=";
			$output .= urlencode($page["id"]);
			$output .= "\">";
			$output .= htmlentities($page["menu_name"]);
			$output .= "</a></li>";
		}
		mysqli_free_result($page_set);
		$output .= "</ul></li>";
	}
	mysqli_free_result($subject_set);
	$output .= "</ul>";
	return $output;
}

function member_navigation($subject_array, $page_array) {
	$output = "<ul class=\"subjects\">";
	$subject_set = find_all_subjects();
	while ($subject = mysqli_fetch_assoc($subject_set)) {
		$output .= "<li";
		if ($subject_array && $subject["id"] == $subject_array["id"]) {
			$output .= " class=\"selected\"";
		}
		$output .= ">";
		$output .= "<a href=\"user_content.php?subject=";
		$output .= urlencode($subject["id"]);
		$output .= "\">";
		$output .= htmlentities($subject["menu_name"]);
		$output .= "</a>";

		if ($subject_array["id"] == $subject["id"] ||
			$page_array["subject_id"] == $subject["id"]) {
			$page_set = find_pages_for_subject($subject["id"]);
		$output .= "<ul class=\"pages\">";
		while ($page = mysqli_fetch_assoc($page_set)) {
			$output .= "<li";
			if ($page_array && $page["id"] == $page_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"user_content.php?page=";
			$output .= urlencode($page["id"]);
			$output .= "\">";
			$output .= htmlentities($page["menu_name"]);
			$output .= "</a></li>";
		}
		$output .= "</ul>";
		mysqli_free_result($page_set);
	}
	    $output .= "</li>"; // end of the subject li
	}
	mysqli_free_result($subject_set);
	$output .= "</ul>";
	return $output;
}

function password_encrypt($password) {
	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	$salt_length = 22;   // Blowfish salts should be 22-characters or more
	$salt = generate_salt($salt_length);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function generate_salt($length) {
	// Not 100% unique, not 100% random, but good enough for a salt
	// MD5 returns 32 characters
	$unique_random_string = md5(uniqid(mt_rand(), true));

	// Valid characters for a salt are [a-zA-Z0-9./]
	$base64_string = base64_encode($unique_random_string);

	// But not '+' which is valid in base64 encoding
	$modified_base64_string = str_replace('+', '.', $base64_string);

	// Truncate string to the correct length
	$salt = substr($modified_base64_string, 0, $length);

	return $salt;
}

function password_check($password, $existing_hash) {
	// existing hash contains format and salt at start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash) {
		return true;
	} else {
		return false;
	}
}

function attempt_login($username, $type, $password) {
	$admin = find_admin_by_username($username, $type);
	if ($admin) {
	    // found admin, now check password
		if (password_check($password, $admin["hashed_password"])) {
		// password matches
			return $admin;
		} else {
		// password does not match
			return false;
		}
	} else {
	    // admin not found
		return false;
	}
}

function attempt_signin($username, $password) {
	$user = find_user_by_username($username);
	if ($user) {
	    // found admin, now check password
		if (password_check($password, $user["hashed_password"])) {
		// password matches
			return $user;
		} else {
		// password does not match
			return false;
		}
	} else {
	    // admin not found
		return false;
	}
}

function logged_in() {
	return isset($_SESSION['admin_id']);
}

function confirm_logged_in() {
	if (!logged_in()) {
		redirect_to("404.php");
	}
}

function signned_in() {
	return isset($_SESSION['id']);
}

function confirm_signned_in() {
	if (!signned_in()) {
		redirect_to("404.php");
	}
}

function confirm_trainer() {
	if ($_SESSION["type"] !== "Trainer") {
		redirect_to("404.php");
	}
}

function confirm_admin() {
	if ($_SESSION["type"] !== "Receptionist") {
		redirect_to("404.php");
	}
}
