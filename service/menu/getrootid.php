<?php
session_start();
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
require_once (__DIR__ ."/../bootstrap.php");
$sql = "select IDTRTCODE from mst_tr_tcode where PARENTID ='0' and TCODEID='ROOT'";
$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
if ($rows[0]){
    echo json_encode(array('id'=>$rows[0]['IDTRTCODE']));
} else {
    echo json_encode(array('msg'=>'Menu Tidak dapat ditemukan.'));
}
?>