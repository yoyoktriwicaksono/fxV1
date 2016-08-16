<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

include '../Configuration/config.php';

$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$statement = oci_parse($con, "select IDTRTCODE from mst_tr_tcode where PARENTID ='0' and TCODEID='ROOT'");
oci_execute($statement);
$row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS);
if ($row){
    echo json_encode(array('id'=>$row['IDTRTCODE']));
} else {
    echo json_encode(array('msg'=>'Menu Tidak dapat ditemukan.'));
}
oci_free_statement($statement);
oci_close($con);
?>