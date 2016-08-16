<?php
session_start();
// Global Config
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../application/core/constants.php');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");
// Entities Config
require_once (__DIR__ .'/../../../base/entities/entities.inc');
require_once (__DIR__ .'/../../../base/entities/MSTKategori.php');
require_once (__DIR__ .'/../../../base/entities/MSTLookup.php');

$_SessionUser = $_SESSION["uname"];
$_idkategori = $_REQUEST['IDKATEGORI'];

$kategori = $entityManager->getRepository(MST_KATEGORI)->findOneBy(array('IDKATEGORI'=>$_idkategori));
if ($kategori !== null) {
    if (ValidateLookup_IsExist($_idkategori)) {
        echo json_encode(array('warning'=>true,'msg'=>ENTITY_KATEGORI . ' ' . $_idkategori . USEDBY.' '.ENTITY_LOOKUP));
        return;
    }
    try {
        $entityManager->remove($kategori);
        $entityManager->flush();
        echo json_encode(array('success'=>true,'msg'=>KATEGORI_DELETE_SUCCESS));
    } catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        echo json_encode(array('msg'=>ENTITY_KATEGORI . ' ' . $_idkategori . FAILDELETING));
    }
} else {
    echo json_encode(array('msg'=>ENTITY_KATEGORI . ' ' . $_idkategori . NOTFOUND));
}

/*
 * Validasi
 */
function ValidateLookup_IsExist($_idkategori)
{
    global $entityManager;
    $lookup = $entityManager->getRepository(MST_LOOKUP)->findOneBy(array('kategori'=>$_idkategori));
    if ($lookup == null) {
        return false;
    } else {
        return true;
    }
}
?>