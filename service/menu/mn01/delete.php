<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_idmenu = $_REQUEST['IDMENU'];

$dbh = $entityManager->getConnection();

if (IsTCodeExist($_idmenu)) {
    $_validation = ValidateDelete($_id);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Master Menu '. $_idmenu . USEDBY.' Table '.$_validation['table']));
        return;
    }
    $dbh->beginTransaction();
    try {
		$sql = "delete from mst_tcode where IDMENU='$_idmenu'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
        // Commit All changes
        $dbh->commit();
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        $dbh->rollback();
        echo json_encode(array('msg'=>'Master Menu '. $_idmenu . FAILDELETING.'<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'Master Menu '. $_idmenu . NOTFOUND));
}
?>