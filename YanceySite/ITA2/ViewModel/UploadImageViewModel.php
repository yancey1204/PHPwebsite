<?php
require_once $root. '/Function/ConnectToDataBase.php';
require_once $root. '/Model/section.php';   // use section CLASS
require_once $root. '/Model/image.php';     // use image CLASS
require_once $root. '/Model/user.php';      // use user CLASS
$imageList = array();
$sectionList = array();

// get the current userID
$s_handler = $dbhandle->prepare("SELECT UserID FROM user WHERE UserEmail = :email");
$s_handler->bindParam(':email', $_SESSION['userEmail'], PDO::PARAM_STR);
$s_handler->execute();
$CurrentUserID = $s_handler->fetchColumn();

// get all section data from database to sectionList of the current user 
$sthandler = $dbhandle->prepare("SELECT * FROM section WHERE UserID = :userID");
$sthandler->bindParam(':userID', $CurrentUserID, PDO::PARAM_STR);
$sthandler->execute();
$SectionsOfC = $sthandler->fetchAll();
foreach ($SectionsOfC as $value) {
    $OSection = new section($value['SectionID'], $value['UserID'], $value['SectionTitle'], $value['SectionDate']);
    array_push($sectionList, $OSection);
}

// get all image data from database to imageList
$handler = $dbhandle->prepare("SELECT * FROM image");
$handler->execute();
$AllImages = $handler->fetchAll();
foreach ($AllImages as $Im) {
    $OneImage = new image($Im['ImageID'], $Im['ImageDes'], $Im['ImageExtension'], $Im['SectionID']);
    array_push($imageList, $OneImage);
}

// get all image data from imageList to SectionList 
foreach ($sectionList as $section) {
    foreach ($imageList as $image) {
        // compare the FK
        if ($image->{'SectionID'} == $section->{'SectionID'}) {
            array_push($section->{'images'}, $image);
        }
    }
}
foreach ($sectionList as $OneSec) {
    $OneSecID = $OneSec->{'SectionID'};
    ?>

    <div class="section">
        <div class="upload">
            <ul class="uploadUl">
                <li class="uploadLi"><h2><?php echo $OneSec->{'SectionTitle'}; ?> </h2></li>
                <li class="uploadLi"><span>
                        <?php
                        $date = split(" ", $OneSec->{'SectionDate'});
                        echo $date[0];
                        ?></span></li></ul>
            <form action="../Function/Delete.php" method ="post" name="deleteform">
                <input name="delete_id" value="<?php echo $OneSecID; ?>" type="hidden">
                <input style="float: right" type="submit" value="delete the section">
            </form>

        </div>
        <?php foreach ($OneSec->{'images'} as $OneIm) { ?>
            <div class="history"> <div class="photo"> 
                    <?php

                    $imagePath = "/YanceySite/ITA2/upload/"
                            . $OneSec->{'UserID'} . "/" . $OneIm->{'ImageID'} . "."
                            . $OneIm->{'ImageExtension'};
//
//                    $imagePath = "/users/i318782/ITA2/upload/"
//                        . $OneSec->{'UserID'} . "/" . $OneIm->{'ImageID'} . "."
//                        . $OneIm->{'ImageExtension'};
                    ?>
                    <img alt="photo" 
                         src="<?php echo $imagePath; ?>" /></div>
                <div class="desc">
                    <p style="color: white"><?php echo $OneIm->{'ImageDes'} ?></p>  
                </div>
            </div>
        <?php } ?>
    </div>


<?php
}