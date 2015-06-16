<?php

session_start();
$session = array();
session_destroy();
unset($_SESSION['userEmail']);
setcookie("Count", "", time() - 3600, "/");
setcookie("useremail", "", time() - 3600, "/");
echo "You've been logged out.";
header("Location: ../View/index.php");
