<?php

$NotLogedIn;
if (!isset($_COOKIE['useremail'])) {
    $NotLogedIn = TRUE;
} else {
    $NotLogedIn = FALSE;
    $_SESSION['userEmail'] = $_COOKIE['useremail'];
}