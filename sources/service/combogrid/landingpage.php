<?php
session_start();
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
require_once (__DIR__ ."/../bootstrap.php");

$q = isset($_POST['q']) ? $_POST['q'] : '';
$sql = "select IDMENU,DISPLAYTEXT from mst_tcode where TIPE='FILE' AND ISUSED=1 AND UPPER(DISPLAYTEXT) like UPPER('".$q."%') order by DISPLAYTEXT";
$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();

$result = array();
foreach ($rows as $row) {
    array_push($result, $row);
}
echo json_encode($result);
?>