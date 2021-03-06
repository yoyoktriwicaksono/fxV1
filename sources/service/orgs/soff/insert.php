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

$_id = $_REQUEST['ENTITYID'];
$_nama = $_REQUEST['NAMA'];
$_alamat = $_REQUEST['ALAMAT'];
$_kota = $_REQUEST['KOTA'];
$_kodepos = $_REQUEST['KODEPOS'];
$_region = $_REQUEST['REGION'];
$_telp1 = $_REQUEST['TELP1'];
$_telp2 = $_REQUEST['TELP2'];

$dbh = $entityManager->getConnection();

if (!IsSOFFExist($_id)) {
    $dbh->beginTransaction();
    try {
        $sql = "insert into MST_SOFF(ENTITYID,NAMA,ALAMAT,KOTA,REGION,KODEPOS,TELP1,TELP2,CREATEDUSER,CREATEDDATE)
		values('$_id','$_nama','$_alamat','$_kota','$_region','$_kodepos','$_telp1','$_telp2','$_iduser',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        // Commit All changes
        $dbh->commit();
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        $dbh->rollback();
        echo json_encode(array('msg'=>'Sales Office Gagal disimpan.<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'Sales Office ' . $_id . EXIST));
}
?>