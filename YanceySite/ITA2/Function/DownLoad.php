<?php

if (isset($_POST['file_name'])) {
    $file = $_POST['file_name'];
    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="' . $file . '"');
    readfile('YanceySite/ITA2/upload/system/' . $file);
    exit();
}