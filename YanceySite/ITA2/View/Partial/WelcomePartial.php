<?php
require_once($root. '/Function/CurrentActivePage.php');
if (!isset($_SESSION['userEmail'])) {
    ?>
    <li class="last inline <?php
    if ($pageName == "About") {
        echo "active";
    }
    ?>"><a href="About.php"><span>About me</span></a></li>
<?php } else { ?>
    <li class="inline <?php
    if ($pageName == "About") {
        echo "active";
    }
    ?>"><a href="About.php"><span>About me</span></a></li>
    <li class="last inline WelsomeSubtitle" ><a id="<?php
                                            if ($pageName == "UploadImage") {
                                                echo "active";
                                            }
                                            ?>" href="UploadImage.php"><span>Welcome</span></a>
        <ul id='WelcomeSub' class="Sub">
            <li><a href="UploadImage.php"><span>Upload</span></a></li>
<!--            <li><a href=""><span>Profile</span></a></li>-->
            <li><a href="../Function/LogOut.php"><span>Logout</span></a></li>
        </ul></li>
    <?php
}

