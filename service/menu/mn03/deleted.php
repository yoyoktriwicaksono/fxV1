<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_ID = $_REQUEST['ID'];

$dbh = $entityManager->getConnection();

$dbh->beginTransaction();
try {
	$sql = "delete from MST_USERTCODE_GROUPMENU where IDTRTCODE=$_ID";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    // Commit All changes
    $dbh->commit();
    echo json_encode(array('success'=>true));
} catch (Exception $e) {
    $dbh->rollback();
    echo json_encode(array('msg'=>'Item Menu Gagal dihapus.<br/>'.$e->getMessage()));
}

/*
include '../Configuration/config.php';

$_ID = $_REQUEST['ID'];

$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
// Delete Detail
$sql = "delete from USERTCODE_GROUPMENU where ID='$_ID'";
$statement = oci_parse($con, $sql);
$rst = oci_execute($statement, OCI_DEFAULT);
if (!$rst) {
    oci_rollback($con);
}
$committed = oci_commit($con);
if ($committed){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Item Menu Gagal dihapus.'.oci_error()));
}
*/
?>