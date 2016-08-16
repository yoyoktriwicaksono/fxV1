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

$_idmenu = $_REQUEST['IDMENU'];
$_displaytext = $_REQUEST['DISPLAYTEXT'];
$_formaplikasi = $_REQUEST['FORMAPLIKASI'];
$_tipe = $_REQUEST['TIPE'];
$_image = $_REQUEST['IMAGE'];
$_parameterform = $_REQUEST['PARAMETERFORM'];
$_guiid = $_REQUEST['GUIID'];
$_url = $_REQUEST['URL'];

$dbh = $entityManager->getConnection();

if (!IsTCodeExist($_idmenu)) {
    $dbh->beginTransaction();
    try {
		$sql = "insert into mst_tcode(IDMENU,DISPLAYTEXT,FORMAPLIKASI,TIPE,IMAGE,PARAMETERFORM,GUIID,URL,CREATEDUSER,CREATEDDATE) 
		values('$_idmenu','$_displaytext','$_formaplikasi','$_tipe','$_image','$_parameterform','$_guiid','$_url','$_iduser',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        // Commit All changes
        $dbh->commit();
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        $dbh->rollback();
        echo json_encode(array('msg'=>'Master Menu Gagal disimpan.<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'Master Menu ' . $_idmenu . EXIST));
}
?>