<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");

$_idmenu = $_REQUEST['IDTRTCODE'];

$dbh = $entityManager->getConnection();

$dbh->beginTransaction();
try {
	$sql = "delete from mst_tr_tcode where IDTRTCODE='$_idmenu'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    // Commit All changes
    $dbh->commit();
    echo json_encode(array('success'=>true));
} catch (Exception $e) {
    $dbh->rollback();
    echo json_encode(array('msg'=>'Master Menu Gagal dihapus.<br/>'.$e->getMessage()));
}
?>