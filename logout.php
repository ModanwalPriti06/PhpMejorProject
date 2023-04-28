<?php
session_start();
session_destroy();
echo "<script>alert('Logout successfully!!');window.location.href='loginform.php'</script>";

?>