<?php
/* * *Count the whole visits * * */
require_once $root. '/Function/ConnectToDataBase.php';
require_once $root. '/Function/getCurrentUerID.php';

// get the current PageCount
try {
    $s_handler = $dbhandle->prepare("SELECT AllVisits FROM page WHERE PageName = :PageName");
    $s_handler->bindParam(':PageName', $pageName, PDO::PARAM_STR);
    $s_handler->execute();
    $CurrentVisit = $s_handler->fetchColumn();
} catch (PDOException $e) {
    echo "can't find current visits" . $e->getMessage();
}

// add a hit
$AllVisits = $CurrentVisit + 1;

// update database
try {
    $s_sql = "UPDATE page SET AllVisits=:AllVisits WHERE PageName = :PageName";
    $a_handler = $dbhandle->prepare($s_sql);
    $a_handler->bindParam(':AllVisits', $AllVisits);
    $a_handler->bindParam(':PageName', $pageName, PDO::PARAM_STR);
    $a_handler->execute();
} catch (PDOException $e) {
    echo $s_sql . "<br>" . $e->getMessage();
}

/* * *Count the visits per user * * */

try {
    $f_handler = $dbhandle->prepare("SELECT PagePerVisits FROM uservisit WHERE UserID=:UserID AND PageName = :PageName");
    $f_handler->bindParam(':UserID', $userID);
    $f_handler->bindParam(':PageName', $pageName, PDO::PARAM_STR);
    $f_handler->execute();
    $result = $f_handler->fetchColumn();
} catch (PDOException $e) {
    echo "error:" . $e->getMessage();
}

if ($result == false) {
    $result = 1;
    try {
        $i_handler = $dbhandle->prepare("INSERT INTO uservisit (UserID,PageName,PagePerVisits) VALUES (:UserID,:PageName,1)");
        $i_handler->bindParam(':UserID', $userID);
        $i_handler->bindParam(':PageName', $pageName, PDO::PARAM_STR);
        $i_handler->execute();
    } catch (PDOException $e) {
        echo "error:" . $e->getMessage();
    }
} else {
    $result ++;
    // update database
    try {
        $q_sql = "UPDATE uservisit SET PagePerVisits=:PagePerVisits WHERE UserID=:UserID AND PageName = :PageName";
        $b_handler = $dbhandle->prepare($q_sql);
        $b_handler->bindParam(':UserID', $userID);
        $b_handler->bindParam(':PagePerVisits', $result);
        $b_handler->bindParam(':PageName', $pageName, PDO::PARAM_STR);
        $b_handler->execute();
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}