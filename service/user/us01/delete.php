<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ ."/validation.php");

$_iduser = $_REQUEST['IDUSER'];

$dbh = $entityManager->getConnection();

if ($_iduser!='super'){
    if (!IsUserExist($_id)) {
        $_validation = ValidateDelete($_id);
        if (!$_validation['status']) {
            echo json_encode(array('warning'=>true,'msg'=>'User '. $_id . USEDBY.' Table '.$_validation['table']));
            return;
        }
        $dbh->beginTransaction();
        try {
            $sql = "delete from MST_USERS where IDUSER='$_iduser'";
            $sth = $dbh->prepare($sql);
            $sth->execute();
            // Commit All changes
            $dbh->commit();
            echo json_encode(array('success'=>true));
        } catch (Exception $e) {
            $dbh->rollback();
            echo json_encode(array('msg'=>'User '. $_id . FAILDELETING.'<br/>'.$e->getMessage()));
        }
    } else {
        echo json_encode(array('msg'=>'User '. $_id . NOTFOUND));
    }
} else {
    echo json_encode(array('msg'=>'Super User Tidak boleh dihapus.'));
}
?>