<?php
session_start();//session is a way to store information (in variables) to be used across multiple pages.
session_destroy();
echo"<script>alert('Successfully LoggedOut!');</script>";
echo "<script>setTimeout(\"location.href = 'login1.php';\",500);</script>";//use for the redirection to some page  
?>
