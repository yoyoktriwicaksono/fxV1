<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_SESSION["uname"];

$_GROUPMENUID = $_REQUEST['GROUPMENUID'];
$_DESKRIPSI = $_REQUEST['DESKRIPSI'];
$_idnodes = $_REQUEST['idnodes'];
$_checked_nodes = explode(',',$_idnodes);

$dbh = $entityManager->getConnection();

if (!IsGroupMenuIDExist($_GROUPMENUID)) {
    $dbh->beginTransaction();
    try {
        $sql = "select IDTRTCODE from mst_tr_tcode where PARENTID ='0' and TCODEID='ROOT'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll();
        $_rootid=$rows[0]['IDTRTCODE'];

        $sql = "insert into MST_GROUPMENU(GROUPMENUID ,DESKRIPSI) values('$_GROUPMENUID','$_DESKRIPSI')";
        $sth = $dbh->prepare($sql);
        $sth->execute();

        $sql = "insert into MST_USERTCODE_GROUPMENU(GROUPMENUID ,IDTRTCODE) values('$_GROUPMENUID',$_rootid)";
        $sth = $dbh->prepare($sql);
        $sth->execute();

        // LOOP INSERT DETAIL MENU
        foreach ($_checked_nodes as $node) {
            $sql = "insert into MST_USERTCODE_GROUPMENU(GROUPMENUID ,IDTRTCODE) values('$_GROUPMENUID','$node')";
            $sth = $dbh->prepare($sql);
            $sth->execute();
        } 

        // Commit All changes
        $dbh->commit();
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        $dbh->rollback();
        echo json_encode(array('msg'=>'Group Menu Gagal disimpan.<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'Group Menu ' . $_GROUPMENUID . EXIST));
}

/*
include '../Configuration/config.php';  

$_GROUPMENUID = $_REQUEST['GROUPMENUID'];
$_DESKRIPSI = $_REQUEST['DESKRIPSI'];
$_idnodes = $_REQUEST['idnodes'];
$_checked_nodes = explode(',',$_idnodes);
//print_r($_checked_nodes);
$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$statement = oci_parse($con, "select IDTRTCODE from mst_tr_tcode where PARENTID ='0' and TCODEID='ROOT'");
oci_execute($statement);
$row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS);
$_rootid=$row['IDTRTCODE'];

// INSERT HEADER
$sql = "insert into MST_GROUPMENU(GROUPMENUID ,DESKRIPSI)
		values('$_GROUPMENUID','$_DESKRIPSI')";
$statement = oci_parse($con, $sql);
$rst = oci_execute($statement, OCI_DEFAULT);
if (!$rst) {
    oci_rollback($con);
}

// INSERT ROOT ID
$sql = "insert into USERTCODE_GROUPMENU(GROUPMENUID ,IDTRTCODE)
		values('$_GROUPMENUID',$_rootid)";
$statement = oci_parse($con, $sql);
$rst = oci_execute($statement, OCI_DEFAULT);
if (!$rst) {
    oci_rollback($con);
}
// LOOP INSERT DETAIL MENU
foreach ($_checked_nodes as $node) {
    $sql = "insert into USERTCODE_GROUPMENU(GROUPMENUID ,IDTRTCODE)
                    values('$_GROUPMENUID','$node')";
    //print_r($sql);
    $statement = oci_parse($con, $sql);
    $rst = oci_execute($statement, OCI_DEFAULT);
    if (!$rst) {
        oci_rollback($con);
    }    
} 
// COMMIT ALL
$committed = oci_commit($con);
if ($committed){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Menu Gagal disimpan.<br />'.ocierror()));
}
oci_free_statement($statement);
oci_close($con);
*/
?>