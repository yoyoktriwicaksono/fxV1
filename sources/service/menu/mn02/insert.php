<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");

$_iduser = $_SESSION["uname"];

$_PARENTID = $_REQUEST['PARENTID'];
$_TCODEID = $_REQUEST['TCODEID'];
$_URUTAN = $_REQUEST['URUTAN'];
$_IDTRTCODE = $_REQUEST['IDTRTCODE'];

$dbh = $entityManager->getConnection();

$dbh->beginTransaction();
try {
	$sql = "insert into mst_tr_tcode(PARENTID,TCODEID,URUTAN,CREATEDUSER,CREATEDDATE) values('$_PARENTID','$_TCODEID','$_URUTAN','$_iduser',NOW())";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    // Commit All changes
    $dbh->commit();
    echo json_encode(array('success'=>true));
} catch (Exception $e) {
    $dbh->rollback();
    echo json_encode(array('msg'=>'Master Menu Gagal disimpan.<br/>'.$e->getMessage()));
}
?>