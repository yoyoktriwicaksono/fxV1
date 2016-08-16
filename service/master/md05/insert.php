<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_SESSION["uname"];
$_alamat = $_REQUEST['ALAMAT'];
$_contactperson = $_REQUEST['CONTACTPERSON'];
$_entityid = $_REQUEST['ENTITYID'];
$_nama = $_REQUEST['NAMA'];
$_telp1 = $_REQUEST['TELP1'];
$_telp2 = $_REQUEST['TELP2'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (!IsWarehouseExist($_entityid)) {
	$dbh->beginTransaction();
	try {
		$sql = "insert into MST_WAREHOUSE(ENTITYID,NAMA,ALAMAT,CONTACTPERSON,TELP1,TELP2,CREATEDDATE,CREATEDUSER) values('$_entityid','$_nama','$_alamat','$_contactperson','$_telp1','$_telp2',SYSDATE,'$_iduser')";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Warehouse Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Warehouse ' . $_entityid . EXIST));
}
?>