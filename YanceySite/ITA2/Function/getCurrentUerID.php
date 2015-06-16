<?php

$sthandler = $dbhandle->prepare("SELECT UserID FROM user WHERE UserEmail = :email");
$sthandler->bindParam(':email', $_SESSION['userEmail'], PDO::PARAM_STR);
$sthandler->execute();
$userID = $sthandler->fetchColumn();

