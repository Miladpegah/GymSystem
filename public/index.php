<?php include("../includes/layouts/header.php"); ?>
<?php include("../includes/layouts/navigation.php"); ?>
<style>
    #top_menu #home  { color: white; }
</style>
<div id="main">
    <div id="navigation"> <br />
        <a href="signin.php">Sign in</a><br />
        <a href="signup.php">Sign up</a>
        <hr />
        <a href="login.php">Staff Login</a>
    </div>
    <div id="page" class="animated fadeIn">
        <div class="box animated bounceInDown" style="background-color: #666600; -webkit-animation-delay: 4s; -moz-animation-delay: 4s; animation-delay: 4s;">Are you a Student?<br /><br /> Sign up today to get 25% discount!</div>
        <div class="box animated bounceInDown" style="clear:right; background-color: #006666; -webkit-animation-delay: 3s; -moz-animation-delay: 3s; animation-delay: 3s;">Sign up online today to get 10% discount!<br /><br /><a class="link" style="color: orange;" href="signup.php">Click Here!</a></div>
        <div class="box animated bounceInDown" style="clear:right; background-color:#660066; -webkit-animation-delay: 2s; -moz-animation-delay: 2s; animation-delay: 2s;">Monthly Membership is £25!<br /><br /> No contract!</div>
        <h1>Welcome to Armstrong Gym Website</h1><br />
        <div id="welcome_hype_container" style="position:relative; overflow:hidden; width:75%; height:300px; border: 2px solid white;">
            <script type="text/javascript" charset="utf-8" src="welcome/welcome_hype_generated_script.js?33478"></script>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>