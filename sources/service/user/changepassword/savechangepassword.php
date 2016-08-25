<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');

require_once (__DIR__ .'/../../bootstrap.php');
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ .'/../../../base/entities/MSTUser.php');

$_SessionUser = $_SESSION["uname"];
$_iduser = $_REQUEST['IDUSER'];
$_password = md5($_REQUEST['PASSWORD']);

//$dbh = $entityManager->getConnection();
//$sth = $dbh->prepare(SQL_SETSTANDARDDATE);
//$sth->execute();

$user = $entityManager->getRepository(MST_USERS)->findOneBy(array('IDUSER'=>$_iduser));
if ($user !== null) {
    try {
        $user->setId($_iduser);
        $user->setPassword($_password);
        $user->setUpdatedUser($_SessionUser);
        $user->setUpdatedDate(new DateTime());
        $entityManager->persist($user);
        $entityManager->flush();
	echo json_encode(array('success'=>true,'msg'=>PASSWORD_SAVE_SUCCESS));
    } catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        echo json_encode(array('msg'=> FAILSAVINGPASSWORD));
    }
} else {
    echo json_encode(array('msg'=>'User ' + $_iduser + NOTFOUND));
}
?>