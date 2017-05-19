<?php
  session_start();
  echo($_SESSION['role']);
 ?>
<form action="logout.php" method="post">
  <input type="submit" name="logout" value="logout">
</form>
