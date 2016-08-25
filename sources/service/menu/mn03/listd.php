<?php
session_start();

require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$dbh = $entityManager->getConnection();

$_GROUPMENUID = $_POST['GROUPMENUID'];

$sql = "select * from mst_usertcode_groupmenu where GROUPMENUID='".$_GROUPMENUID."' order by GROUPMENUID,IDTRTCODE";
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$data = array();
foreach ($rows as $row) {
	array_push($data, $row);
}
$result["rows"] = $data;
echo json_encode($result);

/*
$_page = $_POST['page'];
$_rows = $_POST['rows'];
if ($_page==1) {
	$_limit1 = 0;
	$_limit2 = $_rows;
} else {
	$_limit1 = $_rows * ($_page - 1) + 1;
	$_limit2 = $_rows * $_page;
}

$result = array();  
$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$sql = "select * from mst_usertcode_groupmenu where GROUPMENUID='".$_GROUPMENUID."' order by GROUPMENUID,IDTRTCODE";
//print_r($sql);
$statement = oci_parse($con, $sql);
oci_execute($statement);
while($row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS)){  
    array_push($result, $row);  
}  
oci_free_statement($statement);
oci_close($con);  
echo json_encode($result); 
*/
?>