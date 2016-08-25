<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_SESSION["uname"];
$_idlookup = $_REQUEST['IDLOOKUP'];
$_deskripsi = $_REQUEST['DESKRIPSI'];
$_idkategori = $_REQUEST['IDKATEGORI'];

$dbh = $entityManager->getConnection();

if (!IsLookupExist($_idlookup)) {
	$dbh->beginTransaction();
	try {
		$sql = "insert into mst_lookup(IDLOOKUP,DESKRIPSI,IDKATEGORI,CREATEDDATE,CREATEDUSER) values('$_idlookup','$_deskripsi','$_idkategori',NOW(),'$_iduser')";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Lookup Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Lookup ' . $_idlookup . EXIST));
}
?>