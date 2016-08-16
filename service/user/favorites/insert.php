<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ ."/validation.php");

$_SessionUser = $_SESSION["uname"];
$_IDTRTCODE = $_REQUEST['IDTRTCODE'];

$dbh = $entityManager->getConnection();

$sql = "select TCODEID from MST_TR_TCODE where IDTRTCODE=$_IDTRTCODE";
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$_TCODEID = $rows[0]['TCODEID'];

$sql = "select DISPLAYTEXT from MST_TCODE where IDMENU='$_TCODEID'";
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$_displayText = $rows[0]['DISPLAYTEXT'];

if (!IsFavoritesExist($_TCODEID,$_SessionUser)) {
	$dbh->beginTransaction();
	try {

	    if($_TCODEID != '') {
			$sql = "insert into MST_USERS_FAVORITES(IDUSER,TCODEID,Tipe,CREATEDDATE,CREATEDUSER) values('$_SessionUser','$_TCODEID','F',NOW(),'$_SessionUser')";
	        $sth = $dbh->prepare($sql);
	        $sth->execute();
	    }

	    // Commit All changes
	    $dbh->commit();
	    echo json_encode(array('success'=>true,'msg'=>'Menu '.$_displayText.' berhasil disimpan. Silahkan di reload page untuk mendapatkan perubahan menu favorites'));
	} catch (Exception $e) {
	    $dbh->rollback();
	    echo json_encode(array('msg'=>'Insert Menu Favorite ' . $_nbr . FAILSAVING."<br/>".$e->getMessage()));
	}
} else {
    echo json_encode(array('msg'=>'Menu Favorites ' . $_displayText . EXIST));
}

?>