<?php

function curPageName() {
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

$pageNameE = (string) curPageName();
$pageNameL = explode(".", $pageNameE);
$pageName = $pageNameL[0];
