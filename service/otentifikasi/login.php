<?php
session_start();
require_once (__DIR__ .'/../../application/configuration/global.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');

require_once (__DIR__ ."/../bootstrap.php");
require_once (__DIR__ ."/../../base/entities.php");
require_once (__DIR__ ."/../../base/viewentities/VLogin.php");

$_uname = $_REQUEST['uname'];
$_password = md5($_REQUEST['pass']);
$_passwordnoencrypt = $_REQUEST['pass'];

/**
** ini adalah execute menggunakan SQL langsung
**/
/*
$sql = "select * from VLOGIN where IDUSER='".$_uname."' and PASSWORD='".$_password."'";
$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
*/
//print_r($_REQUEST);

try {
    $vLoginRepo = $entityManager->getRepository(VLOGIN);
    $vLogins = $vLoginRepo->findBy(array('IDUSER'=>$_uname, 'PASSWORD'=>$_password),array());
    $_hasil = false;
    foreach ($vLogins as $vLogin) {
        $_SESSION[LEGAL]=200;
        $_SESSION["uname"]=$vLogin->getIdUser();
        $_SESSION["name"]=$vLogin->getNama();
        $_SESSION["groupmenuid"]=$vLogin->getGroupMenuId();
        $_SESSION["theme"]=$vLogin->getTheme();
        $_SESSION["org_id"]=$vLogin->getOrganization();
        $_SESSION["org_nama"]=$vLogin->getNamaOrganization();
        $_SESSION["org_deskripsi"]=$vLogin->getDeskripsi();
        $_SESSION["soff_id"]=$vLogin->getSalesOffice();
        $_SESSION["soff_nama"]=$vLogin->getNamaSalesOffice();
        $_SESSION["landingpage_displaytext"]=$vLogin->getDISPLAYTEXT();
        $_SESSION["landingpage_url"]=$vLogin->getURL();
        $_hasil = true;
    }
    if ($_hasil) {
        echo json_encode(array('success'=>$_hasil));
    } else {
        echo json_encode(array('success'=>$_hasil,'msg'=>ERROR_LOGIN));
    }
} catch (Exception $e) {
    echo json_encode(array('success'=>$_hasil,'msg'=>$e->getMessage()));
}
?>