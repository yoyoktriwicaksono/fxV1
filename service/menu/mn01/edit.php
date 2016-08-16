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

if (IsTCodeExist($_idmenu)) {
    $dbh->beginTransaction();
    try {
		$sql = "update mst_tcode set DISPLAYTEXT='$_displaytext',FORMAPLIKASI='$_formaplikasi',TIPE='$_tipe',IMAGE='$_image',PARAMETERFORM='$_parameterform',GUIID='$_guiid',URL='$_url',UPDATEDUSER='$_iduser',UPDATEDDATE=NOW() where IDMENU='$_idmenu'"; 
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
/*
$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$sql = "update mst_tcode set DISPLAYTEXT='$_displaytext',FORMAPLIKASI='$_formaplikasi',TIPE='$_tipe',IMAGE='$_image',PARAMETERFORM='$_parameterform',GUIID='$_guiid',URL='$_url' where IDMENU='$_idmenu'"; 
$statement = oci_parse($con, $sql);
oci_execute($statement, OCI_DEFAULT);
$committed = oci_commit($con);
if ($committed){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Menu Gagal disimpan.'));
}
*/
?>