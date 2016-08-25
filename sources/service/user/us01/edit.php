<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduserUpdater = $_SESSION["uname"];

$_iduser = $_REQUEST['IDUSER'];
$_nama = $_REQUEST['NAMA'];
$_password = md5($_REQUEST['PASSWORD']);
$_groupmenuid = $_REQUEST['GROUPMENUID'];
$_org = $_SESSION["org_id"];
$_soff = $_REQUEST['SOFF'];
$_employeeid = $_REQUEST['EMPLOYEEID'];
$_landingpage = $_REQUEST['LANDINGPAGE'];
$_KDTPK = $_REQUEST['KDTPK'];

$dbh = $entityManager->getConnection();

if (!IsUserExist($_id)) {
    $dbh->beginTransaction();
    try {
        $sql = "update MST_USERS set NAMA='$_nama',GROUPMENUID='$_groupmenuid',ORG='$_org',SOFF='$_soff',EMPLOYEEID='$_employeeid',LANDINGPAGE='$_landingpage',KDTPK='$_KDTPK',UPDATEDUSER='$_iduserUpdater',UPDATEDDATE=NOW() where IDUSER='$_iduser'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        // Commit All changes
        $dbh->commit();
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        $dbh->rollback();
        echo json_encode(array('msg'=>'User Gagal disimpan.<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'User ' . $_id . EXIST));
}
?>