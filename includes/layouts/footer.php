<div id="footer">Copyright <?php echo date("Y"); ?>, Milad Pegah</div>
<script type="text/javascript" src="javascripts/jquery.js"></script>
<script type="text/javascript" src="javascripts/main.js"></script>
</body>
</html>
<?php
// 5. Close database connection
  if (isset($connection)) {
      mysqli_close($connection);
  }
?>

