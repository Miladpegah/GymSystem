<?php include("../includes/layouts/header.php"); ?>
<?php include "../includes/layouts/navigation.php"; ?>
<style>#top_menu #contact  { color: white; }</style>
<div id="main">
    <div id="navigation"> <br />
        <a href="signin.php">Sign in</a> <br />
        <a href="signup.php">Sign up</a>
        <hr />
        <a href="login.php">Staff Login</a>
    </div>
    <div id="page" class="animated fadeIn">
        <h1>Contact Us</h1>
        <form name="contactform" method="POST" action="contact.php">
            <table width="450px">
                <tr>
                    <td style="min-width: 150px;"><label for="first_name">First Name *</label></td>
                    <td><input  type="text" name="first_name" maxlength="50" size="30"></td>
                </tr>
                <tr>
                    <td style="min-width: 150px;"><label for="last_name">Last Name *</label></td>
                    <td><input  type="text" name="last_name" maxlength="50" size="30"></td>
                </tr>
                <tr>
                    <td style="min-width: 150px;"><label for="email">Email Address *</label></td>
                    <td><input  type="email" name="email" maxlength="80" size="30"></td>
                </tr>
                <tr>
                    <td style="min-width: 150px;"><label for="telephone">Telephone Number</label></td>
                    <td><input  type="tel" name="telephone" maxlength="30" size="30"></td>
                </tr>
                <tr>
                    <td style="min-width: 150px;"><label for="comments">Message *</label></td>
                    <td><textarea  name="comments" maxlength="75" cols="50" rows="15" style="max-width: 600px;"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="text-align:left"><button type="submit" value="submit" name="submit">Submit</button></td>
                </tr>
            </table>
        </form>
        <?php
          if (isset($_POST['email'])) {
              // EDIT THE 2 LINES BELOW AS REQUIRED
              $email_to = "jakehberry@googlemail.com";
              $email_subject = "Armstrong Gym";

              function died($error) {
                  // your error code can go here
                  echo "<b style=\"color: red;\">We are very sorry, but there were error(s) found with the form you submitted:</b><br /><br /> ";
                  echo $error . "<br /><br />";
                  echo "<div style=\"color: red;\"> Please fix these errors.</div><br /><br />";
                  die();
              }
              // validation expected data exists
              if (!isset($_POST['first_name']) ||
                      !isset($_POST['last_name']) ||
                      !isset($_POST['email']) ||
                      !isset($_POST['telephone']) ||
                      !isset($_POST['comments'])) {
                  died('We are sorry, but there appears to be a problem with the form you submitted.');
              }
              $first_name = $_POST['first_name']; // required
              $last_name = $_POST['last_name']; // required
              $email_from = $_POST['email']; // required
              $telephone = $_POST['telephone']; // not required
              $comments = $_POST['comments']; // required
              $error_message = "";
              $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
              if (!preg_match($email_exp, $email_from)) {
                  $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
              }
              $string_exp = "/^[A-Za-z .'-]+$/";
              if (!preg_match($string_exp, $first_name)) {
                  $error_message .= 'The First Name you entered does not appear to be valid.<br />';
              }
              if (!preg_match($string_exp, $last_name)) {
                  $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
              }
              if (strlen($comments) < 2) {
                  $error_message .= 'The Comments you entered do not appear to be valid.<br />';
              }
              if (strlen($error_message) > 0) {
                  died($error_message);
              }
              $email_message = "Form details below.\n\n";

              function clean_string($string) {
                  $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                  return str_replace($bad, "", $string);
              }
              $email_message .= "First Name: " . clean_string($first_name) . "\n";
              $email_message .= "Last Name: " . clean_string($last_name) . "\n";
              $email_message .= "Email: " . clean_string($email_from) . "\n";
              $email_message .= "Telephone: " . clean_string($telephone) . "\n";
              $email_message .= "Comments: " . clean_string($comments) . "\n";
              $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
              @mail($email_to, $email_subject, $email_message, $headers);
              ?>
              <script type="text/javascript">
                  alert('Thank you for sending us your message!');
              </script>
          <?php } ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>