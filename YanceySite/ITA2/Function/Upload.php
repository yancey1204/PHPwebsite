<?php

session_start(); // Starting Session
if (isset($_FILES["file"]["type"])) {
    require_once 'ConnectToDatabase.php';    //connect to database
    require_once 'getCurrentUerID.php'; // return the userID of the current user as STRING
    define('__ROOT__', dirname(dirname(__FILE__)));
    $targetPath = __ROOT__ . '/upload/' . $userID; //Declaring Path for uploaded images
    if (!is_dir($targetPath)) {// create a folder named after userID
        mkdir($targetPath, 0775);
    }
    /*     * * get SectionTitle SectionDate and generate SectionID * * */
    $title = $_POST["Title"];
    date_default_timezone_set('Europe/Berlin');
    $date = date('m/d/Y h:i:s a', time());
    $sectionID = getGUID(); // generate a unique ID

    /*     * * STORE DATA FOR THIS SECTION * * */
    $sql = 'INSERT INTO section (SectionID,UserID,SectionTitle,SectionDate) VALUES (:SectionID,:UserID,:SectionTitle,:SectionDate)';
    $query = $dbhandle->prepare($sql);
    $query->execute(array(
        'SectionID' => $sectionID,
        ':UserID' => $userID,
        ':SectionTitle' => $title,
        ':SectionDate' => $date
    ));

    /*     * * LOOP FOR GETTING DATA OF IMAGE * * */


    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {// Loop to get individual element from the array
        $imageID = getGUID(); // generate a unique ID
        $validextensions = array("jpeg", "jpg", "png"); // Extensions which are allowed.
        $temporary = explode(".", basename($_FILES['file']['name'][$i]));
        $file_extension = end($temporary);

        if (in_array($file_extension, $validextensions)) {
            if ($_FILES["file"]["error"][$i] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br/><br/>";
            } else {
//            if (file_exists($targetPath . $_FILES["file"]["name"][$i])) { // Target path where file is to be stored
//                echo $_FILES["file"]["name"][$i] . " <span id='invalid'><b>already exists.</b></span> ";
//            } else {

                /*                 * * STORE DATA FOR THIS IMAGE * * */
                $sourcePath = $_FILES['file']['tmp_name'][$i]; // Storing source path of the file in a variable
                $target_Path = $targetPath . "/" . $imageID . "." . $file_extension;     // Set the target path with a new name of image.
                if (move_uploaded_file($sourcePath, $target_Path)) {
                    $des = $_POST["description"][$i];
                    // insert imageID description and userID to database
                    $sql = 'INSERT INTO image (ImageID,ImageDes,ImageExtension,SectionID) VALUES (:ImageID,:ImageDes,:ImageExtension,:SectionID)';
                    $query = $dbhandle->prepare($sql);
                    $query->execute(array(
                        ':ImageID' => $imageID,
                        ':ImageDes' => $des,
                        ':ImageExtension' => $file_extension,
                        ':SectionID' => $sectionID
                    ));
                    echo "<div class='desc'><p>uploaded"; // Moving Uploaded file
                    echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                    echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"][$i] . "<br>";
                    echo "<b>Type:</b> " . $_FILES["file"]["type"][$i] . "<br>";
                    echo "<b>Size:</b> " . ($_FILES["file"]["size"][$i] / 1024) . " kB<br>";
                    echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"][$i] . "<br>";
                    echo "<b>Target file:</b> " . $target_Path . "</p></div>";
                } else {
                    echo "failed";
                }
            }

            //}
        } else {
            echo "<span id='invalid'>***Invalid file Size or Type***<span>";
        }
    }
    $dbhandle = null;
}

function getGUID()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double)microtime() * 10000); //optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = chr(123)// "{"
            . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12)
            . chr(125); // "}"
        return $uuid;
    }
}
