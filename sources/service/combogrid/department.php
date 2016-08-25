<?php
session_start();
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
require_once (__DIR__ ."/../bootstrap.php");

$q = isset($_POST['q']) ? $_POST['q'] : '';
$_idkategori = 'DEPT';
if ($q==='') {
    $sql = "select IDLOOKUP,DESKRIPSI from lookup where idkategori='".$_idkategori."' order by IDLOOKUP";
} else {
    $sql = "select IDLOOKUP,DESKRIPSI from lookup where idkategori='".$_idkategori."' AND UPPER(DESKRIPSI) like UPPER('".$q."%') order by IDLOOKUP";
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