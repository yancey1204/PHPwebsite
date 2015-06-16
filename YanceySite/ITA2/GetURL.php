<?php
define('__ServerRoot', $_SERVER['DOCUMENT_ROOT'] );
$root;

if(__ServerRoot == 'C:/1Yancey_Files/FHICT/YanceySite'){
    $root=$_SERVER['DOCUMENT_ROOT'].'/ITA2';
}
else if(__ServerRoot =='C:\inetpub\wwwroot\root'){
    define('__ooo__', dirname(dirname(__FILE__)));
    $root=__ooo__.'/ITA2';

}
else if(__ServerRoot =='C:/xampp/htdocs'){
    $root =$_SERVER['DOCUMENT_ROOT'] . '/YanceySite/ITA2';
}