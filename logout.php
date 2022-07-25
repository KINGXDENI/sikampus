<?php


unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['level']);

session_destroy();
echo "<script>document.location='login.php'</script>";
?>