<?php
ob_start();
header("Content-type: text/html;charset=utf-8");
require_once ($root. '/Function/CurrentActivePage.php');
?>
<div id="cssmenu">
    <ul id="menulist">
        <li class='inline <?php
        if ($pageName == "index") {
            echo "active";
        }
        ?>' id="index"><a href="index.php"><span>Home</span></a></li>
        <li class='inline' id='NewsSubtitle'><a href='#'><span>News</span></a>
            <ul id='NewsSub' class="Sub">
                <li><a href="http://www.animate-onlineshop.jp/products/index.php?category_id=5"><span>Figure</span></a></li>
                <li><a href="http://www.nicovideo.jp/"><span>TV</span></a></li>
                <li><a href="http://www.bilibili.com/video/game.html"><span>Gaming</span></a></li>
                <li><a href="http://bbs.comicdd.com/"><span>BBS</span></a></li>
            </ul>
        </li>
        <?php require_once'WelcomePartial.php'; ?>
    </ul>
</div>

<div>
    <div class="welcomeMenu"> WELCOME<?php if (isset($_SESSION['userEmail'])) {
            $email = $_SESSION['userEmail'];
            $user = split("\@", $email);?>
        <span id="user"><?php echo $user[0];}?></span>
<?php require_once 'VisitsPartial.php'; ?></div></div>

