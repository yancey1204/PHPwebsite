<?php

class section {

    public $SectionID;
    public $UserID;
    public $SectionTitle;
    public $SectionDate;
    public $images;

    function section($sectionid, $userid, $title, $date) {
        $this->SectionID = $sectionid;
        $this->UserID = $userid;
        $this->SectionTitle = $title;
        $this->SectionDate = $date;
        $this->images = array();
    }

    function SetSectionImages($imagesPara) {
        $this->images = $imagesPara;
    }

}
