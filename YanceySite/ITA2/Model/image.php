<?php

class image {

    public $ImageID;
    public $ImageDes;
    public $SectionID;
    public $ImageExtension;

    // CONSTRUCTOR
    function image($imageid, $imagedes, $imageextension, $sectionid) {
        $this->ImageID = $imageid;
        $this->ImageDes = $imagedes;
        $this->ImageExtension = $imageextension;
        $this->SectionID = $sectionid;
    }

}
