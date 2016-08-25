<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_id = $_REQUEST['ID'];
$_unitdasar = $_REQUEST['UNITDASAR'];
$_unitkonversi = $_REQUEST['UNITKONVERSI'];
$_konversi = $_REQUEST['KONVERSI'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (IsUOMExist($_id)) {
	$dbh->beginTransaction();
	try {
		$sql = "update INV_UNIT_CONVERSION set UNITDASAR='$_unitdasar',UNITKONVERSI='$_unitkonversi',KONVERSI=$_konversi where ID='$_id'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Unit Konversi Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Unit Konversi ' . $_id . EXIST));
}
?>