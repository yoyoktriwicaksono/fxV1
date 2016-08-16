<?php
include '../Configuration/config.php';

$_PARENTID = $_REQUEST['PARENTID'];
$_TCODEID = $_REQUEST['TCODEID'];
$_URUTAN = $_REQUEST['URUTAN'];

$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$sql = "insert into mst_tr_tcode(PARENTID,TCODEID,URUTAN) values('$_PARENTID','$_TCODEID','$_URUTAN')";
$statement = oci_parse($con, $sql);
oci_execute($statement, OCI_DEFAULT);
$committed = oci_commit($con);
if ($committed){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Menu Gagal disimpan.<br />'.ocierror()));
}
oci_free_statement($statement);
oci_close($con);
?>