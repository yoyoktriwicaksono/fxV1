<?php
session_start();

require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$dbh = $entityManager->getConnection();
$_groupmenuid = $_SESSION["groupmenuid"];
if ($_groupmenuid == '') {
	$sql = "select a.*,b.DISPLAYTEXT from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU order by a.IDTRTCODE";
} else {
    $sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b,mst_usertcode_groupmenu c where a.TCODEID=b.IDMENU and a.idtrtcode=c.idtrtcode and c.groupmenuid='$_groupmenuid' and PARENTID=$id order by urutan";
}
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$data = array();
foreach ($rows as $row) {
	array_push($data, $row);
}
$result["rows"] = $data;
echo json_encode($result);
?>