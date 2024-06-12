<?php
session_start();
session_unset();
session_destroy();
header('Location: G1-13login-input.php');
exit();
?>