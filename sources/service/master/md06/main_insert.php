<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_SESSION["uname"];
$_entityid = $_REQUEST['ID'];
$_nama = $_REQUEST['NAMA'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (!IsSizeGroupExist($_entityid)) {
	$dbh->beginTransaction();
	try {
		$sql = "insert into INV_SIZE_GROUP(ID,NAMA,CREATEDDATE,CREATEDUSER) values(SEQSIZEGROUP.NEXTVAL,'$_nama',SYSDATE,'$_iduser')";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Size Group Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Size Group ' . $_entityid . EXIST));
}
?>