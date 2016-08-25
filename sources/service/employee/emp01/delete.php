<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_idemp = $_REQUEST['EMPLOYEEID'];

$dbh = $entityManager->getConnection();

if (IsEmployeeIDExist($_idemp)) {
    $_validation = ValidateDelete($_idemp);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Employee '. $_idemp . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		$sql = "delete from PAY_EMPLOYEE where EMPLOYEEID='$_idemp'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
	    // Commit All changes
	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Employee '. $_idemp . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Employee '. $_idemp . NOTFOUND));
}
?>