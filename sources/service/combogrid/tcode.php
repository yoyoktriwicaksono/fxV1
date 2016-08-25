<?php
session_start();
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
require_once (__DIR__ ."/../bootstrap.php");

$q = isset($_POST['q']) ? $_POST['q'] : '';
if ($q==='') {
    $sql = "select * from mst_tcode order by IDMENU";
} else {
    $sql = "select * from mst_tcode where UPPER(IDMENU) like UPPER('".$q."%') order by IDMENU";
}

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