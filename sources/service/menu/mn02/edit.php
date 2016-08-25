<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");

$_iduser = $_SESSION["uname"];

$_IDTRTCODE = $_REQUEST['IDTRTCODE'];
$_PARENTID = $_REQUEST['PARENTID'];
$_TCODEID = $_REQUEST['TCODEID'];
$_URUTAN = $_REQUEST['URUTAN'];

$dbh = $entityManager->getConnection();

$dbh->beginTransaction();
try {
	$sql = "update mst_tr_tcode set PARENTID='$_PARENTID',TCODEID='$_TCODEID',URUTAN='$_URUTAN',UPDATEDUSER='$_iduser',UPDATEDDATE=NOW() where IDTRTCODE='$_IDTRTCODE'";
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