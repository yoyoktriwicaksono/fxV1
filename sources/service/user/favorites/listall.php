<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$_iduser = $_SESSION["uname"];

try {
    $sql = "select FAVID,DISPLAYTEXT,URL from VFAVORITEMENUS where Tipe='F' AND IDUSER='$_iduser' order by DISPLAYTEXT";
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    $dataFav = array();
    foreach ($rows as $row) {
        array_push($dataFav, $row);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>