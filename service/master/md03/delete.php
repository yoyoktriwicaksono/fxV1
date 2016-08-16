<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_id = $_REQUEST['ID'];

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
$sth->execute();

if (IsUOMExist($_id)) {
    $_validation = ValidateDelete($_id);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Unit Konversi '. $_id . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		$sql = "delete from INV_UNIT_CONVERSION where ID='$_id'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Unit Konversi '. $_id . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Unit Konversi '. $_id . NOTFOUND));
}
?>