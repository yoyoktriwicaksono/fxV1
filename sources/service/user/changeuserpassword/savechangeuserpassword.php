<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');

require_once (__DIR__ .'/../../bootstrap.php');
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ .'/../../../base/entities/MSTUser.php');

$_SessionUser = $_SESSION["uname"];
$_iduser = $_REQUEST['USER_IDUSER'];
$_password = md5($_REQUEST['USER_PASSWORD']);

$dbh = $entityManager->getConnection();

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
        echo json_encode(array('msg'=> FAILSAVINGPASSWORD.'<br/>'.$e->getMessage()));
    }
} else {
    echo json_encode(array('msg'=>'User ' + $_iduser + NOTFOUND));
}
?>