<?php
require_once ($root. '/Function/PageCounter.php');
if ($NotLogedIn == TRUE) {
    ?> 
    <p>ALL <span style="font-weight: bolder"><?= $AllVisits ?></span> visits for this page</p>
    <p id="showLoginForm">Get more infomation please click here to Login</p>
    <?php
    $counter = 1;
    setcookie("Count", $counter, time() + (86400 * 365 * 20), "/");
} else {
    $counter = ++$_COOKIE['Count'];
    setcookie("Count", $counter, time() + (86400 * 365 * 20), "/");
    ?> 
    <p>Your <span style="font-weight: bolder;"> <?= $_COOKIE['Count'] ?> </span>time visits this site after login</p>
    <p>ALL <span style="font-weight: bolder"><?= $AllVisits ?></span> visits for this page</p>
    <p>Your <span  style="font-weight: bolder"><?= $result ?></span> visits for this page</p>
<?php } ?>


