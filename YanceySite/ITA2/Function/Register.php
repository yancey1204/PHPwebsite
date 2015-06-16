<?php

session_start(); // Starting Session
$error = "";
//Register function
//Using ajax to avoid redirecting
if (is_ajax()) {
//get the json data from ajax
    $Registeremail = $_POST["Registeremail"];
    $RegisterPassword = $_POST["RegisterPassword"];
    $RegesterCPassword = $_POST["RegisterCPassword"];
    //Verifcation 
    if (empty($Registeremail) || empty($RegisterPassword) || empty($RegesterCPassword)) {
        $error = "Complete all fields";
    }
// Email validation
    else if (!filter_var($Registeremail, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a  valid email";
    }
// check the length of the password
    else if (strlen($RegisterPassword) <= 6) {
        $error = "Choose a password longer then 6 character";
    }
// Password match
    else if ($RegisterPassword != $RegesterCPassword) {
        $error = "Passwords don't match";
    }
//if(!isset($error))
    else {
//no error
//connect to the database
        include 'ConnectToDatabase.php';
        $sthandler = $dbhandle->prepare("SELECT UserEmail FROM user WHERE UserEmail = :email");
        $sthandler->bindParam(':email', $Registeremail, PDO::PARAM_STR);
        $sthandler->execute();
        if ($sthandler->rowCount() > 0) {
            $error = "exists! cannot register";
        } else {
//insert user infomation to database
            $sql = 'INSERT INTO user (Role,UserEmail,UserPassword) VALUES (:Role,:UserEmail,:UserPassword)';
            $query = $dbhandle->prepare($sql);
            $query->execute(array(
                ':Role' => '2',
                ':UserEmail' => $Registeremail,
                ':UserPassword' => $RegisterPassword
            ));

            echo json_encode("New record created successfully");
            /*             * * set the session user variable ** */
            $_SESSION['userEmail'] = $Registeremail;
            setcookie("useremail", $Registeremail, time() + (86400 * 365 * 20), "/");
            $dbhandle = null;
        }
    }
    if ($error != "") {
        echo json_encode($error);
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function() {
    $return = $_POST;
    //Do what you need to do with the info. The following are some examples.
    //if ($return["favorite_beverage"] == ""){
    //  $return["favorite_beverage"] = "Coke";
    //}
    //$return["favorite_restaurant"] = "McDonald's";
    $return["json"] = json_encode($return);
    echo json_encode($return);
}
