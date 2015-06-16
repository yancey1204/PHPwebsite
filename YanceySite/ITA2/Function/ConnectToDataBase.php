<?php

/* --  Athena Sever  -- */
//    $sdn =  "mysql:host=athena01.fhict.local;dbname=dbi318782";
//    $username = "dbi318782";
//    $password = "0xhML8kS9y";


/* --  Local Sever  -- */
$sdn = "mysql:host=localhost;dbname=dbi318782";
$username = "root";
$password = "";


/* --  Smart Sever  -- */
//$sdn = "mysql:host=MYSQL5005.Smarterasp.net;dbname=db_9b4223_php";
//$username = "9b4223_php";
//$password = "12345678";


try {
    $dbhandle = new PDO($sdn, $username, $password);
    $dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $message = 'Connected to Database<br/>';
} catch (PDOException $e) {
    $error = 'Connection failed: ' . $e->getMessage();
}

