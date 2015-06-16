<!doctype html>
<html>
    <?PHP session_start(); ?>
    <head>
        <meta charset="utf-8">
        <title>I Love Anime</title>
        <link rel="stylesheet" href="Style/MenuBar.css" type="text/css" />
        <link rel="stylesheet" href="Style/welcome.css" type="text/css" />
        <link rel="stylesheet" href="Style/PhoDes.css" type="text/css" />
        <script type="text/javascript" src="Javascript/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="Javascript/showdate.js"></script>
        <script type="text/javascript" src="Javascript/submenu.js"></script>
        <script type="text/javascript" src="Javascript/AjaxLogin.js"></script>
        <script type="text/javascript" src="Javascript/AjaxRegister.js"></script>
        <script type="text/javascript" src="Javascript/showLoginForm.js"></script>
    </head>
    <body>
        <?php require '../GetURL.php'; ?>
        <?php require_once $root . '/Function/CheckIfLogedIn.php'; ?>
        <?php require_once'Partial/LRFormPartial.php'; ?>

        <?php require_once'Partial/ShareLayout.php'; ?>
        <div id="content">
            <?php require_once $root.'/ViewModel/indexViewModel.php'; ?>
        </div>
    </body>
</html>