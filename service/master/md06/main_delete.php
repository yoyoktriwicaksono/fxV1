<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_entityid = $_REQUEST['ID'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (IsSizeGroupExist($_entityid)) {
    $_validation = ValidateMainDelete($_id);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Size Group '. $_entityid . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		// delete detail
		$sql = "delete from INV_SIZE_GROUP_DETAIL where SIZEGROUP='$_entityid'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
        // delete main
		$sql = "delete from INV_SIZE_GROUP where ID='$_entityid'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Size Group '. $_entityid . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Size Group '. $_entityid . NOTFOUND));
}
?>