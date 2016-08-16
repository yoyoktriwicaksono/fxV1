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

$_idemp = $_REQUEST['EMPLOYEEID'];
$_nama = $_REQUEST['NAMA'];
$_alamat = $_REQUEST['ALAMAT'];
$_tempatLahir = $_REQUEST['TMPLAHIR'];
$parts = explode(' ',$_REQUEST['TGLLAHIR']); // 0 tgl, 1 bulan, 2 tahun
$_tglLahir = date ("Y-m-d H:i:s", strtotime(AddZeroOnDate($parts[0]).' '.$parts[1].' '.$parts[2]));
$_dept = $_REQUEST['DEPT'];
$_ghr = $_REQUEST['GHR'];
$_telp1 = $_REQUEST['TELP1'];
$_telp2 = $_REQUEST['TELP2'];
$_email = $_REQUEST['EMAIL'];

$dbh = $entityManager->getConnection();

if (!IsEmployeeIDExist($_idemp)) {
	$dbh->beginTransaction();
	try {
		$sql = "insert into PAY_EMPLOYEE(EMPLOYEEID,NAMA,ALAMAT,TMPLAHIR,TGLLAHIR,DEPT,GHR,TELP1,TELP2,EMAIL,CREATEDUSER,CREATEDDATE) values('$_idemp','$_nama','$_alamat','$_tempatLahir','$_tglLahir','$_dept','$_ghr','$_telp1','$_telp2','$_email','$_iduser',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Employee Gagal disimpan.<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Employee ' . $_idemp . EXIST));
}
?>