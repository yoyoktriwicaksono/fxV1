<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../application/fungsi/fcommon.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ ."/validation.php");

$_favId = $_REQUEST['FAVID'];

$dbh = $entityManager->getConnection();

if (IsFavoriteMenuExist($_favId)) {
    $_validation = ValidateDeleteFavorites($_favId);
    if (!$_validation['status']) {
        echo json_encode(array('warning'=>true,'msg'=>'Menu favorites '. $_favId . USEDBY.' Table '.$_validation['table']));
        return;
    }
	$dbh->beginTransaction();
	try {
		$sql = "delete from MST_USERS_FAVORITES where Tipe='F' AND FAVID=$_favId";
        $sth = $dbh->prepare($sql);
        $sth->execute();

	    $dbh->commit();
		echo json_encode(array('success'=>true));
	} catch (Exception $e) {
	    $dbh->rollback();
		echo json_encode(array('msg'=>'Menu favorite '. $_favId . FAILDELETING.'<br/>'.$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Menu favorite ' . $_favId . EXIST));
}

?>