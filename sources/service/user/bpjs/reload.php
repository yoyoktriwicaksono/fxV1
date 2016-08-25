<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$_iduser = $_SESSION["uname"];

try {
    $sql = "select FAVID,DISPLAYTEXT,URL from VFAVORITEMENUS where Tipe='B' AND IDUSER='$_iduser' order by DISPLAYTEXT";
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    $_result='';
    foreach ($rows as $menuItem) {
        $_displayText = $menuItem['DISPLAYTEXT'];
        $_url = $menuItem['URL'];
        $_result = $_result."<div href='#' onclick=\"menuFavHandler('$_displayText','$_url')\">$_displayText</div>";
    }
    echo $_result;
} catch (Exception $e) {
    echo $e->getMessage();
}
?>