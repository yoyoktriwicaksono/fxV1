<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$_sizegroupid = $_REQUEST['SIZEGROUPID'];
$_page = $_POST['page'];
$_rows = $_POST['rows'];
if ($_page==1) {
	$_limit1 = 0;
	$_limit2 = $_rows;
} else {
	$_limit1 = $_rows * ($_page - 1) + 1;
	$_limit2 = $_rows * $_page;
}

$result = array(); 
$dbh = $entityManager->getConnection();
if ($_sizegroupid !='') {
    $sql = "select IDDETAIL,UKURAN,SIZEGROUP from INV_SIZE_GROUP_DETAIL WHERE SIZEGROUP=$_sizegroupid ORDER BY IDDETAIL,UKURAN";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    foreach ($rows as $row) {
        array_push($result, $row);
    }
}
echo json_encode($result); 
?>