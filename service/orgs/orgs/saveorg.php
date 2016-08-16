<?php
session_start();
// Global Config
require_once (__DIR__ . '/../../../application/configuration/global.message.inc');
require_once (__DIR__ . '/../../../application/core/constants.php');
require_once (__DIR__ . '/../../../init/initialize.php');
require_once (__DIR__ . "/../../bootstrap.php");

$_iduser = $_SESSION["uname"];

$_idorg = $_REQUEST['ENTITYID'];
$_namaorg = $_REQUEST['NAMA'];
$_deskripsiorg = $_REQUEST['DESKRIPSI'];

$dbh = $entityManager->getConnection();

$dbh->beginTransaction();
try {
    $sql = "update MST_ORG SET NAMA='$_namaorg',DESKRIPSI='$_deskripsiorg',UPDATEDDATE=NOW(),UPDATEDUSER='$_iduser' where ENTITYID='$_idorg'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $dbh->commit();
    $_SESSION["org_nama"]=$_namaorg;
    $_SESSION["org_deskripsi"]=$_deskripsiorg;
    echo json_encode(array('success'=>true,'msg'=>'Organization berhasil disimpan'));
} catch (Exception $e) {
    $dbh->rollback();
    echo json_encode(array('msg'=>'Org Gagal disimpan.<br/>'.$e->getMessage()));
}
?>