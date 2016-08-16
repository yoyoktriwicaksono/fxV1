<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_idlookup = $_REQUEST['IDLOOKUP'];

$dbh = $entityManager->getConnection();

if (IsLookupExist($_idlookup)) {
    $_validation = ValidateDelete($_idlookup);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Lookup '. $_idlookup . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		$sql = "delete from mst_lookup where IDLOOKUP='$_idlookup'"; 
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Lookup '. $_idlookup . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Lookup '. $_idlookup . NOTFOUND));
}
?>