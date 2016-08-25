<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
// Entities Config
require_once (__DIR__ ."/../../bootstrap.php");
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ .'/../../../base/entities/MSTKategori.php');

$_SessionUser = $_SESSION["uname"];
$_idkategori = $_REQUEST['IDKATEGORI'];
$_deskripsi = $_REQUEST['DESKRIPSI'];

$dbh = $entityManager->getConnection();

$kategori = $entityManager->getRepository(MST_KATEGORI)->findOneBy(array('IDKATEGORI'=>$_idkategori));
if ($kategori === null) {
    try {
        $kategori = new MSTKategori();
        $kategori->setId($_idkategori);
        $kategori->setDeskripsi($_deskripsi);
        $kategori->setCreatedUser($_SessionUser);
        $kategori->setCreatedDate(new DateTime());
        $entityManager->persist($kategori);
        $entityManager->flush();
        echo json_encode(array('success'=>true,'msg'=>KATEGORI_SAVE_SUCCESS));
    } catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        echo json_encode(array('msg'=>ENTITY_KATEGORI . ' ' . $_idkategori . FAILSAVING));
    }
} else {
    echo json_encode(array('msg'=>ENTITY_KATEGORI . ' ' . $_idkategori . EXIST));
}
?>