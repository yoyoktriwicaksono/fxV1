<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ ."/validation.php");

$_iddetail = $_REQUEST['IDDETAIL'];
$_sizegrupid = $_REQUEST['SIZEGROUP'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (IsSizeGroupDetailExist($_iddetail)) {
    $_validation = ValidateDetailDelete($_iddetail);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Configuration Size Transaksi '. $_iddetail . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		$sql = "delete from INV_SIZE_GROUP_DETAIL where IDDETAIL=$_iddetail";
        $sth = $dbh->prepare($sql);
        $sth->execute();

	    $dbh->commit();
		echo json_encode(array('success'=>true,'sizegroupid'=>$_sizegrupid));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Configuration Size Transaksi '. $_iddetail . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Configuration Size Transaksi ' . $_iddetail . EXIST));
}
?>