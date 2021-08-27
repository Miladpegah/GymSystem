<?php include("../includes/layouts/header.php"); // header.php is included on top  ?>
<?php include ("../includes/layouts/navigation.php"); // navigation.php is included on the left  ?>
<style>
    /*if we are in about.php then make the color white in navigtion*/
    #top_menu #about  { color: white; }
</style>
<div id="main">
    <div id="navigation"> <br />
        <!--links inside the navigation-->
        <a href="signin.php">Sign in</a> <br />
        <a href="signup.php">Sign up</a>
        <hr />
        <a href="login.php">Staff Login</a>
    </div>
    <div id="page" class="animated fadeIn">
        <h1>About Us</h1>
        <article>
            <h2>About the gym</h2>
            <p>Arnstrong Gyms brings a fresh approach to gym membership. By stripping out unnecessary costs (keeping things simple, streamlining our approach and doing away with pushy sales staff) and by focusing on what matters: great equipment in a great space - we aim to reduce costs to you, but deliver a high quality gym experience.</p>
            <h2>Recent openings</h2>
            <p>Swindon: Paramount Bulding, SN1 2SD<br>
                <br>
                London, Acton: Unit 4, 195 The Vale, W3 7QE</p>
            <h2>We're also working on...</h2>
            <ul>
                <li>Gloucester</li>
                <li>Sheffield</li>
                <li>Coventry</li>
                <li>Leicester</li>
                <li>Basingstoke</li>
                <li>Birmingham</li>
                <li>Bournemouth</li>
                <li>Oxford</li>
                <li>Reading</li>
                <li>Bristol</li>
                <li>Cardiff</li>
                <li>Swansea</li>
                <li>Cheltenham</li>
            </ul>
            <h2>Fresh thinking</h2>
            <ul>
                <li>Our air exchange system has the ability to change the entire air within the gym 9 times per hour, that's once every 7 minutes. That's a huge volume of air within a church like building of 8.5m in height.</li>
                <li>We've invested heavily in technology to do away with traditional reception areas and bubble gum chewing reception staff. You sign up on this website, then simply let yourself in 24 hours a day with a PIN code.</li>
                <li>And since we've done away the reception area, we have a higher percentage of gym floor space than traditional gyms, and that means we can maintain our low prices. The result is a high spec, low price gym.</li>
                <li>CCTV watches over you, to ensure you are safe, and help buttons ensure you can call on someone at any time.</li>
                <li>We keep our full time staff numbers low to be able to maintain our low prices to you, but at the same time we offer you a high number of the best in local Personal Trainers, who you can book via our website.</li>
                <li>And we don't skimp on gym equipment either. For example, our running machines cost £7,000 each, and we open with at least 30 in each site. And by constantly micro-managing the equipment mix, we aim to ensure there's plenty of equipment for everyone, with no waiting for popular items.</li>
            </ul>
        </article>
    </div>
</div>
<?php
  include("../includes/layouts/footer.php"); // footer is included on bottom
?>