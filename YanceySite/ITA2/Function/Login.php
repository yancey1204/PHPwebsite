<?php

//Login function
session_start(); // Starting Session
$message = ''; // Variable To Store Error Message
//using ajax to avoid redirecting
if (is_ajax()) {
//get the json data from ajax
    $LoginEmail = $_POST["LoginEmail"];
    $Loginpassword = $_POST["LoginPassword"];


//check if the users is already logged in 
    if (isset($_SESSION['userEmail'])) {
        $message = 'Users is already logged in';
    }
//verify that the user filled in all the fields
    else if (empty($LoginEmail) || empty($Loginpassword)) {
        $message = "Complete all fields";
    }
    /*     * * check the password is the correct length ** */ else if (strlen($Loginpassword) > 20 || strlen($Loginpassword) < 4) {
        $message = 'Incorrect Length for Password';
    } else {
//connect to the database
        include 'ConnectToDatabase.php';
// SQL query to fetch information of registerd users and finds user match.
        $sthandler = $dbhandle->prepare("SELECT UserEmail FROM user WHERE UserEmail = :email AND UserPassword = :password");
        $sthandler->bindParam(':email', $LoginEmail, PDO::PARAM_STR);
        $sthandler->bindParam(':password', $Loginpassword);
        $sthandler->execute();
        $userEmail = $sthandler->fetchColumn();
        /*         * * if we have no result then fail boat ** */
        if ($userEmail == false) {
            $message = 'Login Failed';
        }
        /*         * * if we do have a result, all is well ** */ else {
            /*             * * set the session user variable ** */
            $_SESSION['userEmail'] = $userEmail;
            /*             * * tell the user we are logged in ** */
            setcookie("useremail", $userEmail, time() + (86400 * 365 * 20), "/");
            $message = 'You are now logged in';
        }
    }
    echo json_encode($message);
}

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function() {
    $return = $_POST;
    $return["json"] = json_encode($return);
    echo json_encode($return);
}
