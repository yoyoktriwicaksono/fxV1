<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_SESSION["uname"];

$_iddetail = $_REQUEST['IDDETAIL'];
$_sizegrupid = $_REQUEST['SIZEGROUP'];
$_ukuran = $_REQUEST['UKURAN'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (IsSizeGroupDetailExist($_iddetail)) {
	$dbh->beginTransaction();
	try {
		$sql = "UPDATE INV_SIZE_GROUP_DETAIL SET UKURAN='$_ukuran',UPDATEDDATE=SYSDATE,UPDATEDUSER='$_iduser' WHERE IDDETAIL=$_iddetail";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true,'sizegroupid'=>$_sizegrupid));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Size Group Item Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Size Group Item ' . $_iddetail . EXIST));
}
?>