<!doctype html>
<?PHP session_start();
require '../GetURL.php';?>
<html>
    <head>
        <meta charset="utf-8">
        <title>I Love Anime</title>
        <link rel="stylesheet" href="Style/MenuBar.css" type="text/css" />
        <link rel="stylesheet" href="Style/welcome.css" type="text/css" />
        <link rel="stylesheet" href="Style/PhoDes.css" type="text/css" />
        <link rel="stylesheet" href="Style/upload.css" type="text/css" />
        <script type="text/javascript" src="Javascript/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="Javascript/showdate.js"></script>
        <script type="text/javascript" src="Javascript/submenu.js"></script>
        <script type="text/javascript" src="Javascript/AjaxUpload.js"></script>
        <script type="text/javascript" src="Javascript/ShowUploadSection.js"></script>
    </head>

    <body>
        <?php require_once $root. '/Function/CheckIfLogedIn.php'; ?>
        <?php require_once'Partial/ShareLayout.php'; ?>

        <div id="cssmenu" style="margin-top:15px">
            <ul id="menulist">
                <li class='inline' id="upload"><a href="#"><span>UPLOAD your picture</span></a></li>
            </ul>
        </div>
        <div id="selectImage" class="section"style="display:none">
            <div class="upload">
                <h2>Select Your Image</h2></div>
            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <ul class="uploadUl"><li class="uploadLi"><span>Title: </span></li>
                    <li class="uploadLi">
                        <input type="text" name="Title"></li></ul>
                <div class="input_fields_wrap">
                    <div id="image_preview" class="photo image_preview"><img id="previewing" src="images/noimage.png" /></div>
                    <hr id="line">
                    <div><input type="file" name="file[]" id="file" required /></div>
                    <div class="textareaContainer"><textarea rows="8"  name="description[]"></textarea></div>
                </div>
                <button class="add_field_button">Add More Fields</button>
                <input style="margin:1px 0px 20px 38px;" type="submit" value="Upload" class="submit" />
            </form>
            <h4 id='loading'style="display: none" class="desc" >loading..</h4>
            <div id="message"></div> 
        </div>
        <div class="section"><ul id="menulist">
                <li class='inline' id="showHistory"><a href="#">
                        <span>Show upload history</span></a></li></ul>
            <form action="../Function/DownLoad.php" method ="post" name="downloadform">
                <input name="file_name" value="TongueTwister.txt" type="hidden">
                <input type="submit" value="download the text">
            </form>
        </div>
        <div id="HostoryList" style="display: none">  
            <?php require_once $root . '/ViewModel/UploadImageViewModel.php'; ?>
        </div>
    </body>
</html>
