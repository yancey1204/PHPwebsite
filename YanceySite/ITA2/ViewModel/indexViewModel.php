<?php
require_once $root. '/Function/ConnectToDataBase.php';
require_once $root. '/Model/section.php';   // use section CLASS
require_once $root. '/Model/image.php';     // use image CLASS
$ImageList = array();
$SectionList = array();

// get section data from database to sectionList whoes userID is current user
$st_handler = $dbhandle->prepare("SELECT * FROM section");
$st_handler->execute();
$AllSections = $st_handler->fetchAll();
foreach ($AllSections as $value) {
    $OneSection = new section($value['SectionID'], $value['UserID'], $value['SectionTitle'], $value['SectionDate']);
    array_push($SectionList, $OneSection);
}

// get all image data from database to imageList
$handler = $dbhandle->prepare("SELECT * FROM image");
$handler->execute();
$AllImages = $handler->fetchAll();
foreach ($AllImages as $Im) {
    $OneImage = new image($Im['ImageID'], $Im['ImageDes'], $Im['ImageExtension'], $Im['SectionID']);
    array_push($ImageList, $OneImage);
}

// get all image data from imageList to SectionList 
foreach ($SectionList as $section) {
    foreach ($ImageList as $image) {
        // compare the FK
        if ($image->{'SectionID'} == $section->{'SectionID'}) {
            array_push($section->{'images'}, $image);
        }
    }
}

foreach ($SectionList as $OneSec) {
    ?>
    <div class="section">
        <div class="date">
            <p><?php
                $UploadDate = preg_split("/[\s,]+/", $OneSec->{'SectionDate'});
                $uploadTime = split("/", $UploadDate[0]);
                echo $uploadTime[2];
                ?></p>
            <span><?php echo $uploadTime[0]; ?>-<?php echo $uploadTime[1] ?></span></div>
        <div class="title">
            <h2> <?php echo $OneSec->{'SectionTitle'} ?></h2>
        </div>
            <?php foreach ($OneSec->{'images'} as $OneIm) { ?>
            <div class="photo"> 
                <?php
                $imagePath = "/YanceySite/ITA2/upload/"
                        . $OneSec->{'UserID'} . "/" . $OneIm->{'ImageID'} . "."
                        . $OneIm->{'ImageExtension'};

//                $imagePath = "/users/i318782/ITA2/upload/"
//                    . $OneSec->{'UserID'} . "/" . $OneIm->{'ImageID'} . "."
//                    . $OneIm->{'ImageExtension'};
                ?>
                <img alt="nisan" 
                     src="<?php echo $imagePath; ?>" /> 
            </div>
            <div class="desc">
                <p><?php echo $OneIm->{'ImageDes'} ?></p>  </div>
    <?php } ?>
    </div>
<?php
}

