<!doctype html>
<?PHP
session_start();
require '../GetURL.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>I Love Anime</title>
        <link rel="stylesheet" href="Style/MenuBar.css" type="text/css" />
        <link rel="stylesheet" href="Style/welcome.css" type="text/css" />
        <link rel="stylesheet" href="Style/PhoDes.css" type="text/css" />
        <link rel="stylesheet" href="Style/mailForm.css" type="text/css" />
        <script type="text/javascript" src="Javascript/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="Javascript/submenu.js"></script>
        <script type="text/javascript" src="Javascript/AjaxLogin.js"></script>
        <script type="text/javascript" src="Javascript/AjaxRegister.js"></script>
        <script type="text/javascript" src="Javascript/showLoginForm.js"></script>
    </head>

    <body>
        <?php require_once $root . '/Function/CheckIfLogedIn.php'; ?>
        <?php require_once'Partial/LRFormPartial.php'; ?>
<?php require_once'Partial/ShareLayout.php'; ?>
        <div id="banner">
            <div class="title"><h2>About the SITE</h2></div>
            <p> This is a website for anime fun to share their favourite animation and thoughts. </p>
            <p>You can also commemorate the amazing animation you ever saw.</p>
            <p> We love animation!!!</p>

            <div class="title"><h2>About the ME</h2></div>
            <p> Hello! My name is Yancey. I am a girl studying at ICT.</p>
            <p> I Love animation and I like all the beautiful sentences.</p>
            <p> I like listening to Japanese songs as well as BGM which is appeared in the animation. </p>
            <p> o(#&macr;&or;&macr;)==O))&macr;&or;&macr;)o&sum;( &macr;&Oacute;;&macr;) </p>
            <p> And I just feel so crazy about it. That pasion drive me travelling around Japan and learning Japanese.</p>
            <p> Let's have fun!</p>
        </div>
        <div id="form-main">
            <div id="form-div">
                <form class="form" action="Function/SendEmail.php" method="post" id="form1">
                    <p class="name">
                        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
                    </p>
                    <p class="email">
                        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
                    </p>
                    <p class="text">
                        <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
                    </p>
                    <div class="submit">
                        <input type="submit" value="SEND" id="button-blue"/>
                        <div class="ease"></div>
                    </div>
                </form>
            </div></div>
    </body>
</html>
